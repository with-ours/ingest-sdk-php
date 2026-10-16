<?php

declare(strict_types=1);

namespace OursPrivacy\Batch\BatchCreateParams\Event\UserProperties\CustomProperty\UnionMember4\UnionMember4\UnionMember4\UnionMember4;

use OursPrivacy\Core\Concerns\SdkUnion;
use OursPrivacy\Core\Conversion\Contracts\Converter;
use OursPrivacy\Core\Conversion\Contracts\ConverterSource;
use OursPrivacy\Core\Conversion\ListOf;
use OursPrivacy\Core\Conversion\MapOf;

/**
 * Any JSON value: string, number, boolean, array, object, or null.
 *
 * @phpstan-type UnionMember3Variants = string|null|float|bool|list<mixed>|array<string,mixed>
 * @phpstan-type UnionMember3Shape = UnionMember3Variants
 */
final class UnionMember3 implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', 'float', 'bool', new ListOf('mixed'), new MapOf('mixed')];
    }
}
