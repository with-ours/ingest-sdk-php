<?php

declare(strict_types=1);

namespace OursPrivacy\Batch\BatchNewResponse;

use OursPrivacy\Batch\BatchNewResponse\Result\UnionMember0;
use OursPrivacy\Batch\BatchNewResponse\Result\UnionMember1;
use OursPrivacy\Core\Concerns\SdkUnion;
use OursPrivacy\Core\Conversion\Contracts\Converter;
use OursPrivacy\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type UnionMember0Shape from \OursPrivacy\Batch\BatchNewResponse\Result\UnionMember0
 * @phpstan-import-type UnionMember1Shape from \OursPrivacy\Batch\BatchNewResponse\Result\UnionMember1
 *
 * @phpstan-type ResultVariants = UnionMember0|UnionMember1
 * @phpstan-type ResultShape = ResultVariants|UnionMember0Shape|UnionMember1Shape
 */
final class Result implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [UnionMember0::class, UnionMember1::class];
    }
}
