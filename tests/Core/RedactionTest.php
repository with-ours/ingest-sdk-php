<?php

namespace Tests\Core;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use OursPrivacy\Core\Attributes\Optional;
use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;
use OursPrivacy\Core\Exceptions\APIStatusException;
use OursPrivacy\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class Login implements BaseModel
{
    /** @use SdkModel<array<string, mixed>> */
    use SdkModel;

    #[Required]
    public string $user;

    #[Required]
    public string $password;

    #[Optional]
    public ?Login $nested;

    public function __construct(string $user, string $password, ?Login $nested = null)
    {
        $this->initialize();

        $this->user = $user;
        $this->password = $password;

        null !== $nested && $this['nested'] = $nested;
    }
}

/**
 * @internal
 *
 * @coversNothing
 */
#[CoversNothing]
class RedactionTest extends TestCase
{
    private const SECRET = 'SENTINEL_SECRET_DO_NOT_LOG';

    #[Test]
    public function testPrintingAModelHidesSecretsAtAnyDepth(): void
    {
        $login = new Login('still_visible', self::SECRET, new Login('nested', self::SECRET));

        $outputs = [...$this->printed($login), '__toString' => (string) $login];
        foreach ($outputs as $name => $output) {
            $this->assertStringNotContainsString(self::SECRET, $output, $name);
            $this->assertStringContainsString('still_visible', $output, $name);
            $this->assertStringContainsString('***', $output, $name);
        }

        $this->assertSame(self::SECRET, $login->password);
        $this->assertStringContainsString(self::SECRET, (string) json_encode($login));
    }

    #[Test]
    public function testPrintingAnExceptionHidesTheRequestsSecrets(): void
    {
        $request = new Request(
            'POST',
            'https://example.test/x',
            ['Authorization' => 'Bearer '.self::SECRET],
            '{"password":"'.self::SECRET.'"}',
        );
        $response = new Response(
            400,
            ['Content-Type' => 'application/json'],
            '{"password":"'.self::SECRET.'","code":"still_visible"}',
        );

        $exception = APIStatusException::from($request, $response);

        $outputs = [...$this->printed($exception), 'message' => $exception->getMessage()];
        foreach ($outputs as $name => $output) {
            $this->assertStringNotContainsString(self::SECRET, $output, $name);
            $this->assertStringContainsString('still_visible', $output, $name);
        }
    }

    #[Test]
    public function testRedactKeepsOtherValues(): void
    {
        $this->assertSame(
            ['a' => 1, 'pass_word' => '***', 'list' => [['PASSWORD' => '***']], 'text' => 'password'],
            Util::redactSensitive(['a' => 1, 'pass_word' => 'x', 'list' => [['PASSWORD' => ['y']]], 'text' => 'password']),
        );
    }

    /** @return array<string, string> */
    private function printed(mixed $value): array
    {
        ob_start();
        var_dump($value);
        $dumped = (string) ob_get_clean();

        return ['print_r' => print_r($value, true), 'var_dump' => $dumped];
    }
}
