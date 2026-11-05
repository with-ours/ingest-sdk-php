<?php

namespace Tests\Core;

use OursPrivacy\Core\Attributes\Optional;
use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class Dog implements BaseModel
{
    /** @use SdkModel<array<string, mixed>> */
    use SdkModel;

    #[Required]
    public string $name;

    #[Required('age_years')]
    public int $ageYears;

    /** @var list<string>|null */
    #[Optional]
    public ?array $friends;

    #[Required]
    public ?string $owner;

    /**
     * @param list<string>|null $friends
     */
    public function __construct(
        string $name,
        int $ageYears,
        ?string $owner,
        ?array $friends = null,
    ) {
        $this->initialize();

        $this->name = $name;
        $this->ageYears = $ageYears;
        $this->owner = $owner;

        null !== $friends && $this['friends'] = $friends;
    }
}

/**
 * @internal
 *
 * @coversNothing
 */
#[CoversNothing]
class ModelTest extends TestCase
{
    #[Test]
    public function testBasicGetAndSet(): void
    {
        $model = new Dog(name: 'Bob', ageYears: 12, owner: null);
        $this->assertEquals(12, $model->ageYears);

        ++$model->ageYears;
        $this->assertEquals(13, $model->ageYears);
    }

    #[Test]
    public function testNullAccess(): void
    {
        $model = new Dog(name: 'Bob', ageYears: 12, owner: null);
        $this->assertNull($model->owner);
        $this->assertNull($model->friends);
    }

    #[Test]
    public function testArrayGetAndSet(): void
    {
        $model = new Dog(name: 'Bob', ageYears: 12, owner: null);
        $model->friends ??= [];
        $this->assertEquals([], $model->friends);
        $model->friends[] = 'Alice';
        $this->assertEquals(['Alice'], $model->friends);
    }

    #[Test]
    public function testDiscernsBetweenNullAndUnset(): void
    {
        $modelUnsetFriends = new Dog(name: 'Bob', ageYears: 12, owner: null);
        $modelNullFriends = new Dog(name: 'bob', ageYears: 12, owner: null);
        $modelNullFriends->friends = null;

        $this->assertEquals(12, $modelUnsetFriends->ageYears);
        $this->assertEquals(12, $modelNullFriends->ageYears);

        $this->assertTrue($modelUnsetFriends->offsetExists('ageYears'));
        $this->assertTrue($modelNullFriends->offsetExists('ageYears'));

        $this->assertNull($modelUnsetFriends->friends);
        $this->assertNull($modelNullFriends->friends);

        $this->assertFalse($modelUnsetFriends->offsetExists('friends'));
        $this->assertTrue($modelNullFriends->offsetExists('friends'));
    }

    #[Test]
    public function testIssetOnOmittedProperties(): void
    {
        $model = new Dog(name: 'Bob', ageYears: 12, owner: null);
        $this->assertFalse(isset($model->owner));
        $this->assertFalse(isset($model->friends));
    }

    #[Test]
    public function testAPropertyTheModelDoesNotHaveGivesTheFallback(): void
    {
        $model = new Dog(name: 'Bob', ageYears: 12, owner: null);

        $this->assertSame('fallback', $model->breed ?? 'fallback');
        $this->assertFalse(isset($model->breed));
        $this->assertTrue(empty($model->breed));
        $this->assertNull($model['breed']);
    }

    #[Test]
    public function testAnOmittedPropertyGivesTheFallback(): void
    {
        $model = new Dog(name: 'Bob', ageYears: 12, owner: null);

        $this->assertSame('fallback', $model->friends ?? 'fallback');
        $this->assertSame('fallback', $model->owner ?? 'fallback');
    }

    #[Test]
    public function testASetPropertyIgnoresTheFallback(): void
    {
        $model = new Dog(name: 'Bob', ageYears: 12, owner: 'Eve', friends: ['Alice']);

        $this->assertSame('Bob', $model->name ?? 'fallback');
        $this->assertSame(['Alice'], $model->friends ?? 'fallback');
        $this->assertTrue(isset($model->friends));
    }

    #[Test]
    public function testReadingAPropertyTheModelDoesNotHaveStillThrows(): void
    {
        $model = new Dog(name: 'secret-name', ageYears: 12, owner: null);

        try {
            $model->breed; // @phpstan-ignore-line
            $this->fail('expected an exception');
        } catch (\RuntimeException $error) {
            $this->assertStringContainsString("'breed'", $error->getMessage());
            $this->assertStringContainsString(Dog::class, $error->getMessage());
            $this->assertStringNotContainsString('secret-name', $error->getMessage());
        }
    }

    #[Test]
    public function testAnUndocumentedPropertyIsReadByArrayAccess(): void
    {
        $model = Dog::fromArray(['name' => 'Bob', 'age_years' => 12, 'owner' => null, 'breed' => 'Lab']);

        $this->assertSame('Lab', $model['breed']);
        $this->assertSame('fallback', $model->breed ?? 'fallback');
        $this->assertFalse(isset($model->breed));
    }

    #[Test]
    public function testAnIncongruentValueIsNotReplacedByTheFallback(): void
    {
        $model = new Dog(name: 'Bob', ageYears: 12, owner: null);
        $model['friends'] = 'not a list';

        $this->assertSame('not a list', $model['friends']);
        $this->assertTrue(isset($model->friends));
        $this->expectExceptionMessage('array access');
        $this->assertNull($model->friends ?? null);
    }

    #[Test]
    public function testArrayAccessOnAnAbsentPropertyRaisesNoNotice(): void
    {
        $model = new Dog(name: 'Bob', ageYears: 12, owner: null);

        set_error_handler(static function (int $severity, string $message): never {
            throw new \ErrorException($message, 0, $severity);
        });

        try {
            $this->assertNull($model['breed']);
            $this->assertNull($model['friends']);
        } finally {
            restore_error_handler();
        }
    }

    #[Test]
    public function testSerializeBasicModel(): void
    {
        $model = new Dog(name: 'Bob', ageYears: 12, owner: 'Eve', friends: ['Alice', 'Charlie']);
        $this->assertEquals(
            '{"name":"Bob","age_years":12,"friends":["Alice","Charlie"],"owner":"Eve"}',
            json_encode($model)
        );
    }

    #[Test]
    public function testSerializeModelWithOmittedProperties(): void
    {
        $model = new Dog(name: 'Bob', ageYears: 12, owner: null);
        $this->assertEquals(
            '{"name":"Bob","age_years":12,"owner":null}',
            json_encode($model)
        );
    }

    #[Test]
    public function testSerializeModelWithExplicitNull(): void
    {
        $model = new Dog(name: 'Bob', ageYears: 12, owner: null);
        $model->friends = null;
        $this->assertEquals(
            '{"name":"Bob","age_years":12,"friends":null,"owner":null}',
            json_encode($model)
        );
    }
}
