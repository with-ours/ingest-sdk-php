<?php

declare(strict_types=1);

namespace OursPrivacy\Visitor\VisitorUpsertParams\UserProperties;

use OursPrivacy\Core\Concerns\SdkUnion;
use OursPrivacy\Core\Conversion\Contracts\Converter;
use OursPrivacy\Core\Conversion\Contracts\ConverterSource;
use OursPrivacy\Core\Conversion\ListOf;
use OursPrivacy\Core\Conversion\MapOf;
use OursPrivacy\Visitor\VisitorUpsertParams\UserProperties\CustomProperty\UnionMember3;
use OursPrivacy\Visitor\VisitorUpsertParams\UserProperties\CustomProperty\UnionMember4;

/**
 * @phpstan-import-type UnionMember3Shape from \OursPrivacy\Visitor\VisitorUpsertParams\UserProperties\CustomProperty\UnionMember3
 * @phpstan-import-type UnionMember4Shape from \OursPrivacy\Visitor\VisitorUpsertParams\UserProperties\CustomProperty\UnionMember4
 *
 * @phpstan-type CustomPropertyVariants = string|null|float|bool|list<string|null|float|bool|list<mixed>|array<string,mixed>>|array<string,string|null|float|bool|list<string|null|float|bool|list<mixed>|array<string,mixed>>|array<string,string|null|float|bool|list<string|null|float|bool|list<mixed>|array<string,mixed>>|array<string,string|null|float|bool|list<string|null|float|bool|list<mixed>|array<string,mixed>>|array<string,string|null|float|bool|list<string|null|float|bool|list<mixed>|array<string,mixed>>>>>>
 * @phpstan-type CustomPropertyShape = CustomPropertyVariants|list<UnionMember3Shape>|array<string,UnionMember4Shape>
 */
final class CustomProperty implements ConverterSource
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
            new ListOf(UnionMember3::class, nullable: true),
            new MapOf(UnionMember4::class, nullable: true),
        ];
    }
}
