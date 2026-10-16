<?php

declare(strict_types=1);

namespace OursPrivacy\Batch\BatchCreateParams\Event\UserProperties\CustomProperty\UnionMember4\UnionMember4\UnionMember4;

use OursPrivacy\Batch\BatchCreateParams\Event\UserProperties\CustomProperty\UnionMember4\UnionMember4\UnionMember4\UnionMember4\UnionMember3;
use OursPrivacy\Core\Concerns\SdkUnion;
use OursPrivacy\Core\Conversion\Contracts\Converter;
use OursPrivacy\Core\Conversion\Contracts\ConverterSource;
use OursPrivacy\Core\Conversion\ListOf;

/**
 * @phpstan-import-type UnionMember3Shape from \OursPrivacy\Batch\BatchCreateParams\Event\UserProperties\CustomProperty\UnionMember4\UnionMember4\UnionMember4\UnionMember4\UnionMember3
 *
 * @phpstan-type UnionMember4Variants = string|null|float|bool|list<string|null|float|bool|list<mixed>|array<string,mixed>>
 * @phpstan-type UnionMember4Shape = UnionMember4Variants|list<UnionMember3Shape>
 */
final class UnionMember4 implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'string',
            'float',
            'bool',
            new ListOf(
                UnionMember3::class,
                nullable: true,
            ),
        ];
    }
}
