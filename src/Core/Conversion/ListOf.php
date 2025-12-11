<?php

declare(strict_types=1);

namespace OursPrivacy\Core\Conversion;

use OursPrivacy\Core\Conversion\Concerns\ArrayOf;
use OursPrivacy\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class ListOf implements Converter
{
    use ArrayOf;

    // @phpstan-ignore-next-line missingType.iterableValue
    private function empty(): array|object
    {
        return [];
    }
}
