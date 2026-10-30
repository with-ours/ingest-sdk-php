<?php

declare(strict_types=1);

namespace OursPrivacy\Core\Concerns;

use OursPrivacy\Core\Conversion;
use OursPrivacy\Core\Conversion\DumpState;
use OursPrivacy\RequestOptions;

/**
 * @internal
 */
trait SdkParams
{
    /**
     * @param array<string, mixed>|RequestOptions|null $options
     *
     * @return array{array<string, mixed>, array<string, mixed>}
     */
    public static function parseRequest(mixed $params, array|RequestOptions|null $options): array
    {
        $converter = self::converter();
        $state = new DumpState;
        $dumped = (array) Conversion::dump($converter, value: $params, state: $state);
        // Keep only the caller's options so the client's configured defaults
        // (for example maxRetries or timeout) still apply to unset keys.
        $opts = $options instanceof RequestOptions ? $options->toExplicitProperties() : ($options ?? []);

        if (!$state->canRetry) {
            $opts['maxRetries'] = 0;
        }

        // @phpstan-ignore-next-line return.type
        return [$dumped, $opts];
    }
}
