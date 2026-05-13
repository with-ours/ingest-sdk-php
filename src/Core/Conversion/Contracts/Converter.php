<?php

declare(strict_types=1);

namespace OursPrivacy\Core\Conversion\Contracts;

use OursPrivacy\Core\Conversion\CoerceState;
use OursPrivacy\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
