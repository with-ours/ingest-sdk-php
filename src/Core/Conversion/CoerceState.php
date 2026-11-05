<?php

declare(strict_types=1);

namespace OursPrivacy\Core\Conversion;

/**
 * @internal
 */
final class CoerceState
{
    public function __construct(
        public bool $translateNames = true,
        public int $yes = 0,
        public int $no = 0,
        public int $maybe = 0,
        public int $branched = 0,
        /** Declared model properties found in the value, the measure of how specific a union variant is. */
        public int $matched = 0,
    ) {}
}
