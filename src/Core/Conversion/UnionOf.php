<?php

declare(strict_types=1);

namespace OursPrivacy\Core\Conversion;

use OursPrivacy\Core\Contracts\BaseModel;
use OursPrivacy\Core\Conversion;
use OursPrivacy\Core\Conversion\Contracts\Converter;
use OursPrivacy\Core\Conversion\Contracts\ConverterSource;

/**
 * @internal
 */
final class UnionOf implements Converter
{
    /**
     * @param array<string, Converter|ConverterSource|string>|list<Converter|ConverterSource|string> $variants
     */
    public function __construct(
        private readonly array $variants,
        private readonly ?string $discriminator = null,
    ) {}

    public function coerce(mixed $value, CoerceState $state): mixed
    {
        if (!is_null($target = $this->resolveVariant(value: $value))) {
            return Conversion::coerce($target, value: $value, state: $state);
        }

        // Score every variant rather than stopping at the first one without a
        // miss: unknown keys don't count against a variant, so a variant whose
        // properties are a subset of another's also fits the larger shape.
        // Ties keep declaration order.
        $best = null;
        foreach ($this->variants as $_ => $variant) {
            ++$state->branched;
            $newState = new CoerceState(translateNames: $state->translateNames);

            $coerced = Conversion::coerce($variant, value: $value, state: $newState);
            if (($newState->yes + $newState->maybe) === 0) {
                continue;
            }

            $rank = [$newState->no > 0, -$newState->matched, -$newState->yes, -$newState->maybe, $newState->no];
            if (is_null($best) || ($rank <=> $best[0]) < 0) {
                $best = [$rank, $newState, $coerced];
            }
        }

        if (is_null($best)) {
            ++$state->no;

            return $value;
        }

        [, $newState, $coerced] = $best;
        $state->yes += $newState->yes;
        $state->maybe += $newState->maybe;
        $state->no += $newState->no;
        $state->matched += $newState->matched;

        return $coerced;
    }

    public function dump(mixed $value, DumpState $state): mixed
    {
        if (!is_null($target = $this->resolveVariant(value: $value))) {
            return Conversion::dump($target, value: $value, state: $state);
        }

        $alternatives = [];
        foreach ($this->variants as $_ => $variant) {
            ++$state->branched;
            if ($value instanceof $variant) {
                return Conversion::dump($variant, value: $value, state: $state);
            }

            $newState = new DumpState;
            $dumped = Conversion::dump($variant, value: $value, state: $newState);
            if (($newState->no + $newState->maybe) === 0) {
                $state->yes += $newState->yes;

                return $dumped;
            }
            if ($newState->maybe > 0) {
                $alternatives[] = [[-$newState->yes, -$newState->maybe, $newState->no], $newState, $dumped];
            }
        }

        usort(
            $alternatives,
            static fn (array $a, array $b): int => $a[0][0] <=> $b[0][0] ?: $a[0][1] <=> $b[0][1] ?: $a[0][2] <=> $b[0][2]
        );

        if (empty($alternatives)) {
            ++$state->no;

            return Conversion::dump_unknown($value, state: $state);
        }

        [[,$newState, $best]] = $alternatives;
        $state->yes += $newState->yes;
        $state->maybe += $newState->maybe;
        $state->no += $newState->no;

        return $best;
    }

    private function resolveVariant(
        mixed $value,
    ): Converter|ConverterSource|string|null {
        if ($value instanceof BaseModel) {
            return $value::class;
        }

        if (
            null !== $this->discriminator
            && is_array($value)
            && array_key_exists($this->discriminator, array: $value)
        ) {
            $discriminator = $value[$this->discriminator];
            if (!is_string($discriminator)) {
                return null;
            }

            return $this->variants[$discriminator] ?? null;
        }

        return null;
    }
}
