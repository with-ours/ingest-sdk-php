<?php

declare(strict_types=1);

namespace OursPrivacy\Batch\BatchCreateParams\Event\UserProperties;

use OursPrivacy\Batch\BatchCreateParams\Event\UserProperties\Consent\UnionMember3;
use OursPrivacy\Batch\BatchCreateParams\Event\UserProperties\Consent\UnionMember4;
use OursPrivacy\Core\Concerns\SdkUnion;
use OursPrivacy\Core\Conversion\Contracts\Converter;
use OursPrivacy\Core\Conversion\Contracts\ConverterSource;
use OursPrivacy\Core\Conversion\ListOf;
use OursPrivacy\Core\Conversion\MapOf;

/**
 * @phpstan-import-type UnionMember3Shape from \OursPrivacy\Batch\BatchCreateParams\Event\UserProperties\Consent\UnionMember3
 * @phpstan-import-type UnionMember4Shape from \OursPrivacy\Batch\BatchCreateParams\Event\UserProperties\Consent\UnionMember4
 *
 * @phpstan-type ConsentVariants = string|null|float|bool|list<string|null|float|bool|list<mixed>|array<string,mixed>>|array<string,string|null|float|bool|list<string|null|float|bool|list<mixed>|array<string,mixed>>|array<string,string|null|float|bool|list<string|null|float|bool|list<mixed>|array<string,mixed>>|array<string,string|null|float|bool|list<string|null|float|bool|list<mixed>|array<string,mixed>>|array<string,string|null|float|bool|list<string|null|float|bool|list<mixed>|array<string,mixed>>>>>>
 * @phpstan-type ConsentShape = ConsentVariants|list<UnionMember3Shape>|array<string,UnionMember4Shape>
 */
final class Consent implements ConverterSource
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
