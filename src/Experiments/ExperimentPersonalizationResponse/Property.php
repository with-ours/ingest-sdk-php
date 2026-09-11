<?php

declare(strict_types=1);

namespace OursPrivacy\Experiments\ExperimentPersonalizationResponse;

use OursPrivacy\Core\Concerns\SdkUnion;
use OursPrivacy\Core\Conversion\Contracts\Converter;
use OursPrivacy\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-type PropertyVariants = string|float|bool
 * @phpstan-type PropertyShape = PropertyVariants
 */
final class Property implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return ['string', 'float', 'bool'];
    }
}
