<?php

namespace Tests\Core;

use OursPrivacy\Core\Attributes\Optional;
use OursPrivacy\Core\Attributes\Required;
use OursPrivacy\Core\Concerns\SdkModel;
use OursPrivacy\Core\Contracts\BaseModel;
use OursPrivacy\Core\Conversion;
use OursPrivacy\Core\Conversion\CoerceState;
use OursPrivacy\Core\Conversion\Contracts\Converter;
use OursPrivacy\Core\Conversion\EnumOf;
use OursPrivacy\Core\Conversion\ListOf;
use OursPrivacy\Core\Conversion\MapOf;
use OursPrivacy\Core\Conversion\UnionOf;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class SuccessRow implements BaseModel
{
    /** @use SdkModel<array<string, mixed>> */
    use SdkModel;

    #[Required]
    public int $index;

    #[Required(type: new EnumOf([true]))]
    public bool $success;
}

class FailedRow implements BaseModel
{
    /** @use SdkModel<array<string, mixed>> */
    use SdkModel;

    #[Required]
    public int $index;

    #[Required(type: new EnumOf([false]))]
    public bool $success;

    #[Required(enum: new EnumOf(['invalid_event', 'queue_failed']))]
    public string $code;

    #[Required]
    public string $message;
}

/** Two shapes with nothing to tell them apart but their properties. */
class LooseRow implements BaseModel
{
    /** @use SdkModel<array<string, mixed>> */
    use SdkModel;

    #[Required]
    public int $index;
}

class DetailedRow implements BaseModel
{
    /** @use SdkModel<array<string, mixed>> */
    use SdkModel;

    #[Required]
    public int $index;

    #[Required('error_code')]
    public string $errorCode;
}

class AllOptional implements BaseModel
{
    /** @use SdkModel<array<string, mixed>> */
    use SdkModel;

    #[Optional]
    public ?string $first;

    #[Optional]
    public ?string $second;

    #[Optional]
    public ?string $third;
}

class Named implements BaseModel
{
    /** @use SdkModel<array<string, mixed>> */
    use SdkModel;

    #[Required]
    public string $name;
}

class NamedTwin implements BaseModel
{
    /** @use SdkModel<array<string, mixed>> */
    use SdkModel;

    #[Required]
    public string $name;
}

class RowWithOptionals implements BaseModel
{
    /** @use SdkModel<array<string, mixed>> */
    use SdkModel;

    #[Required]
    public int $index;

    #[Optional]
    public ?string $first;

    #[Optional]
    public ?string $second;
}

class ListHolder implements BaseModel
{
    /** @use SdkModel<array<string, mixed>> */
    use SdkModel;

    /** @var list<string> */
    #[Required(list: 'string')]
    public array $items;

    #[Required]
    public int $count;
}

class ScalarHolder implements BaseModel
{
    /** @use SdkModel<array<string, mixed>> */
    use SdkModel;

    #[Required]
    public string $items;
}

/**
 * @internal
 *
 * @coversNothing
 */
#[CoversNothing]
class UnionOfTest extends TestCase
{
    /**
     * @return iterable<string, array{array<string, mixed>, class-string}>
     */
    public static function rows(): iterable
    {
        yield 'a success row' => [['index' => 0, 'success' => true], SuccessRow::class];

        yield 'a failed row' => [
            ['index' => 1, 'success' => false, 'code' => 'queue_failed', 'message' => 'm'],
            FailedRow::class,
        ];

        yield 'a failed row with a code a newer API added' => [
            ['index' => 1, 'success' => false, 'code' => 'brand_new', 'message' => 'm'],
            FailedRow::class,
        ];

        yield 'a failed row missing required properties' => [['index' => 1, 'success' => false], FailedRow::class];

        yield 'a success row with unknown properties' => [
            ['index' => 0, 'success' => true, 'traceId' => 't'],
            SuccessRow::class,
        ];
    }

    /**
     * @param array<string, mixed> $row
     * @param class-string         $expected
     */
    #[Test]
    #[DataProvider('rows')]
    public function testLiteralPicksTheVariant(array $row, string $expected): void
    {
        $this->assertInstanceOf($expected, $this->coerce([SuccessRow::class, FailedRow::class], $row));
    }

    #[Test]
    public function testLiteralPicksTheVariantInEitherOrder(): void
    {
        $failed = ['index' => 1, 'success' => false, 'code' => 'queue_failed', 'message' => 'm'];
        $success = ['index' => 0, 'success' => true];
        $variants = [FailedRow::class, SuccessRow::class];

        $this->assertInstanceOf(FailedRow::class, $this->coerce($variants, $failed));
        $this->assertInstanceOf(SuccessRow::class, $this->coerce($variants, $success));
    }

    #[Test]
    public function testFailedRowReadsItsOwnProperties(): void
    {
        $row = $this->coerce([SuccessRow::class, FailedRow::class], [
            'index' => 1,
            'success' => false,
            'code' => 'queue_failed',
            'message' => 'Queue transport failed',
        ]);

        $this->assertInstanceOf(FailedRow::class, $row);
        $this->assertSame('queue_failed', $row->code);
        $this->assertSame('Queue transport failed', $row->message);
        $this->assertFalse($row->success);
    }

    #[Test]
    public function testAPartialBatchCanBeLoopedOverToFindRowsToRetry(): void
    {
        /** @var list<SuccessRow|FailedRow> $rows */
        $rows = Conversion::coerce(
            new ListOf(new UnionOf([SuccessRow::class, FailedRow::class])),
            value: [
                ['index' => 0, 'success' => true],
                ['index' => 1, 'success' => false, 'code' => 'queue_failed', 'message' => 'retry me'],
                ['index' => 2, 'success' => false, 'code' => 'invalid_event', 'message' => 'fix me'],
            ],
            state: new CoerceState,
        );

        $codes = [];
        foreach ($rows as $row) {
            $codes[$row->index] = $row->code ?? null;
        }
        $this->assertSame([0 => null, 1 => 'queue_failed', 2 => 'invalid_event'], $codes);

        $this->assertFalse(isset($rows[0]->code));
        $this->assertTrue(isset($rows[1]->code));
        $this->assertNull($rows[0]['code']);

        // A direct read is a mistake on this variant, not a value of null.
        $this->expectException(\RuntimeException::class);
        $rows[0]->code; // @phpstan-ignore-line
    }

    #[Test]
    public function testListOfUnionDecodesEachItem(): void
    {
        $rows = Conversion::coerce(new ListOf(new UnionOf([SuccessRow::class, FailedRow::class])), value: [
            ['index' => 0, 'success' => true],
            ['index' => 1, 'success' => false, 'code' => 'queue_failed', 'message' => 'm'],
        ]);

        $this->assertIsArray($rows);
        [$ok, $failed] = $rows;
        $this->assertInstanceOf(SuccessRow::class, $ok);
        $this->assertInstanceOf(FailedRow::class, $failed);
    }

    #[Test]
    public function testWithoutALiteralTheMostSpecificVariantWins(): void
    {
        $variants = [LooseRow::class, DetailedRow::class];

        $this->assertInstanceOf(DetailedRow::class, $this->coerce($variants, ['index' => 1, 'error_code' => 'x']));
        $this->assertInstanceOf(LooseRow::class, $this->coerce($variants, ['index' => 1]));
        $this->assertInstanceOf(LooseRow::class, $this->coerce(array_reverse($variants), ['index' => 1]));
    }

    #[Test]
    public function testAbsentOptionalPropertiesAreNotEvidence(): void
    {
        $value = $this->coerce([AllOptional::class, DetailedRow::class], ['index' => 1, 'error_code' => 'x']);
        $this->assertInstanceOf(DetailedRow::class, $value);

        $value = $this->coerce([LooseRow::class, RowWithOptionals::class], ['index' => 1]);
        $this->assertInstanceOf(LooseRow::class, $value);
    }

    #[Test]
    public function testAVariantWithAllItsRequiredPropertiesBeatsACloserOneMissingSome(): void
    {
        $value = ['index' => 1, 'success' => false, 'code' => 'queue_failed'];

        $this->assertInstanceOf(LooseRow::class, $this->coerce([FailedRow::class, LooseRow::class], $value));
    }

    #[Test]
    public function testATieKeepsDeclarationOrder(): void
    {
        $value = ['name' => 'n'];

        $this->assertInstanceOf(Named::class, $this->coerce([Named::class, NamedTwin::class], $value));
        $this->assertInstanceOf(NamedTwin::class, $this->coerce([NamedTwin::class, Named::class], $value));
    }

    #[Test]
    public function testAModelBeatsAMapOfTheSameKeys(): void
    {
        $value = ['name' => 'n', 'nickname' => 'x', 'title' => 'y'];

        $this->assertInstanceOf(Named::class, $this->coerce([Named::class, new MapOf('string')], $value));
        $this->assertInstanceOf(Named::class, $this->coerce([new MapOf('string'), Named::class], $value));
    }

    #[Test]
    public function testAMapStillDecodesWhenNoModelFits(): void
    {
        $value = ['nickname' => 'x', 'title' => 'y'];

        $this->assertSame($value, $this->coerce([Named::class, new MapOf('string')], $value));
    }

    #[Test]
    public function testScalarAndContainerVariantsAreUnchanged(): void
    {
        $scalars = ['string', 'float', 'bool'];
        $this->assertSame('x', $this->coerce($scalars, 'x'));
        $this->assertSame('5', $this->coerce($scalars, '5'));
        $this->assertSame(1.5, $this->coerce($scalars, 1.5));
        $this->assertSame(2.0, $this->coerce($scalars, 2));
        $this->assertTrue($this->coerce($scalars, true));

        $this->assertSame(5, $this->coerce(['int', 'string'], 5));
        $this->assertSame(['a', 'b'], $this->coerce([new ListOf('string'), 'string'], ['a', 'b']));
        $this->assertSame('a', $this->coerce([new ListOf('string'), 'string'], 'a'));
        $this->assertSame(['k' => 1.5], $this->coerce(['mixed'], ['k' => 1.5]));
    }

    #[Test]
    public function testAListPropertyDoesNotAcceptAScalar(): void
    {
        $value = $this->coerce([ListHolder::class, ScalarHolder::class], ['items' => 'a', 'count' => 1]);

        $this->assertInstanceOf(ScalarHolder::class, $value);
    }

    #[Test]
    public function testAValueNoVariantFitsIsReturnedAsIs(): void
    {
        $state = new CoerceState;
        $value = Conversion::coerce(new UnionOf([Named::class, 'bool']), value: 'x', state: $state);

        $this->assertSame('x', $value);
        $this->assertSame(1, $state->no);
    }

    #[Test]
    public function testShapesKeyedByPropertyNameKeepTheirVariant(): void
    {
        $value = ['index' => 1, 'errorCode' => 'x'];
        $state = new CoerceState(translateNames: false);

        $coerced = Conversion::coerce(new UnionOf([LooseRow::class, DetailedRow::class]), value: $value, state: $state);

        $this->assertInstanceOf(DetailedRow::class, $coerced);
        $this->assertSame('x', $coerced->errorCode);
    }

    #[Test]
    public function testEnumScoring(): void
    {
        $tally = static function (EnumOf $enum, mixed $value): array {
            $state = new CoerceState;
            $enum->coerce($value, state: $state);

            return [$state->yes, $state->maybe, $state->no];
        };

        $this->assertSame([1, 0, 0], $tally(new EnumOf([true]), true));
        $this->assertSame([0, 0, 1], $tally(new EnumOf([true]), false));
        $this->assertSame([0, 0, 1], $tally(new EnumOf(['a']), 'b'));
        $this->assertSame([0, 1, 0], $tally(new EnumOf(['a', 'b']), 'c'));
        $this->assertSame([0, 0, 1], $tally(new EnumOf(['a', 'b']), 1));
    }

    /** @param list<Converter|string> $variants */
    private function coerce(array $variants, mixed $value): mixed
    {
        return Conversion::coerce(new UnionOf($variants), value: $value, state: new CoerceState);
    }
}
