<?php

namespace Tests\Core;

use OursPrivacy\Core\Conversion;
use OursPrivacy\Core\Conversion\CoerceState;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/** @internal */
#[CoversNothing]
class ConversionTest extends TestCase
{
    #[Test]
    public function testStringStreamChunks(): void
    {
        $fragments = static function (): \Generator {
            yield 'prefix';

            yield 42;

            yield 1.5;

            yield true;

            yield false;

            yield null;

            yield new class() implements \Stringable {
                public function __toString(): string
                {
                    return 'suffix';
                }
            };
        };

        $this->assertSame('prefix421.51suffix', Conversion::coerce('string', $fragments(), state: new CoerceState));
    }

    #[Test]
    public function testInvalidStringStreamChunk(): void
    {
        $fragments = static function (): \Generator {
            yield new \stdClass;
        };

        $this->expectException(\UnexpectedValueException::class);
        Conversion::coerce('string', $fragments(), state: new CoerceState);
    }
}
