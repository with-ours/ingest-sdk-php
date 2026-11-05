<?php

declare(strict_types=1);

namespace OursPrivacy\Core\Concerns;

use OursPrivacy\Core\Contracts\BaseModel;
use OursPrivacy\Core\Conversion;
use OursPrivacy\Core\Conversion\CoerceState;
use OursPrivacy\Core\Conversion\Contracts\Converter;
use OursPrivacy\Core\Conversion\ModelOf;
use OursPrivacy\Core\Util;

/**
 * @internal
 *
 * @template-covariant Shape of array<string, mixed>
 */
trait SdkModel
{
    private static ModelOf $converter;

    /**
     * @var array<string, mixed> keeps track of undocumented data
     */
    private array $_data = [];

    /**
     * @internal
     *
     * @return array<string, mixed>
     */
    public function __serialize(): array
    {
        $properties = $this->toProperties();

        return array_map(static fn ($v) => self::serialize($v), array: $properties);
    }

    /**
     * @internal
     *
     * @param array<string, mixed> $data
     */
    public function __unserialize(array $data): void
    {
        foreach ($data as $key => $value) {
            // @phpstan-ignore-next-line argument.type
            $this->offsetSet($key, value: $value);
        }
    }

    /**
     * @internal
     *
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
        // @phpstan-ignore-next-line return.type
        return Util::redactSensitive($this->__serialize());
    }

    /**
     * @internal
     */
    public function __toString(): string
    {
        return Util::prettyEncodeJson($this->__debugInfo());
    }

    /**
     * @internal
     *
     * Magic get is intended to occur when we have manually unset
     * a native class property, indicating an omitted value,
     * or a property overridden with an incongruent type
     *
     * @throws \Exception
     */
    public function __get(string $key): mixed
    {
        if (!array_key_exists($key, array: self::$converter->properties)) {
            // The model holds the API's payload, so the message names only the class.
            throw new \RuntimeException(
                "Property '{$key}' does not exist on ".static::class.". Use `\$model->{$key} ?? null` if it may be absent, or `\$model['{$key}']` for an undocumented property.",
            );
        }

        // The unset property was overridden by a value with an incongruent type.
        // It's forbidden for an optional value to be `null` in the payload.
        if (array_key_exists($key, array: $this->_data)) {
            throw new \Exception(
                "The {$key} property is overridden, use the array access ['{$key}'] syntax to the raw payload property.",
            );
        }

        // An optional property which was unset to be omitted from serialized is being accessed.
        // Return null to match user's expectations.
        // @phpstan-ignore-next-line return.type
        return null;
    }

    /**
     * @internal
     *
     * `isset()`, `empty()` and `??` ask this before {@link __get()}, so they give
     * their usual answer for a property this model doesn't have, such as the
     * properties of another variant of a union.
     *
     * A value with an incongruent type counts as set. `??` then reaches the exception
     * in {@link __get()}, rather than replacing a value from the API with its fallback.
     */
    public function __isset(string $key): bool
    {
        return array_key_exists($key, array: self::$converter->properties)
            && isset($this->_data[$key]);
    }

    /**
     * @internal
     *
     * Like {@link __unserialize()}, but for raw API payloads, whose keys are
     * API property names rather than PHP property names
     *
     * @param array<string, mixed> $data
     */
    public function unserializeFromApiPayload(array $data): void
    {
        foreach (self::$converter->properties as $name => $info) {
            if ($name !== $info->apiName && array_key_exists($info->apiName, array: $data)) {
                $data[$name] = $data[$info->apiName];
                unset($data[$info->apiName]);
            }
        }

        $this->__unserialize($data);
    }

    /**
     * @internal
     *
     * @return Shape
     */
    public function toProperties(): array
    {
        // @phpstan-ignore-next-line return.type
        return [...Util::get_object_vars($this), ...$this->_data];
    }

    /**
     * @internal
     *
     * @param key-of<Shape> $offset
     */
    public function offsetExists(mixed $offset): bool
    {
        // @phpstan-ignore-next-line function.alreadyNarrowedType
        if (!is_string($offset)) {
            throw new \InvalidArgumentException;
        }

        if (array_key_exists($offset, array: $this->_data)) {
            return true;
        }

        if (array_key_exists($offset, array: self::$converter->properties)) {
            if (isset($this->{$offset})) {
                return true;
            }

            $property = self::$converter->properties[$offset]->property;

            return $property->isInitialized($this);
        }

        return false;
    }

    /**
     * @internal
     *
     * @param key-of<Shape> $offset
     */
    public function &offsetGet(mixed $offset): mixed
    {
        // @phpstan-ignore-next-line function.alreadyNarrowedType
        if (!is_string($offset)) {
            throw new \InvalidArgumentException;
        }

        // @phpstan-ignore-next-line function.alreadyNarrowedType
        if (!$this->offsetExists($offset)) {
            // Returning the literal by reference raises a notice, which many frameworks throw.
            $missing = null;

            // @phpstan-ignore-next-line return.type
            return $missing;
        }

        if (array_key_exists($offset, array: $this->_data)) {
            // @phpstan-ignore-next-line return.type
            return $this->_data[$offset];
        }

        // @phpstan-ignore-next-line return.type
        return $this->{$offset};
    }

    /**
     * @internal
     *
     * @param key-of<Shape> $offset
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        // @phpstan-ignore-next-line function.alreadyNarrowedType
        if (!is_string($offset)) {
            throw new \InvalidArgumentException;
        }

        $type = array_key_exists($offset, array: self::$converter->properties)
            ? self::$converter->properties[$offset]->type
            : 'mixed';

        $coerced = Conversion::coerce($type, value: $value, state: new CoerceState(translateNames: false));

        // @phpstan-ignore-next-line function.alreadyNarrowedType
        if (property_exists($this, property: $offset)) {
            try {
                // @phpstan-ignore-next-line assign.propertyType
                $this->{$offset} = $coerced;
                unset($this->_data[$offset]);

                return;
                // @phpstan-ignore-next-line catch.neverThrown
            } catch (\TypeError) {
                unset($this->{$offset});
            }
        }

        $this->_data[$offset] = $coerced;
    }

    /**
     * @internal
     *
     * @param key-of<Shape> $offset
     */
    public function offsetUnset(mixed $offset): void
    {
        // @phpstan-ignore-next-line function.alreadyNarrowedType
        if (!is_string($offset)) {
            throw new \InvalidArgumentException;
        }

        // @phpstan-ignore-next-line function.alreadyNarrowedType
        if (property_exists($this, property: $offset)) {
            unset($this->{$offset});
        }

        unset($this->_data[$offset]);
    }

    /**
     * @internal
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        // @phpstan-ignore-next-line argument.type
        return Conversion::dump(self::converter(), value: $this->__serialize());
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): static
    {
        // @phpstan-ignore-next-line argument.type
        return self::converter()->from($data);
    }

    /**
     * @internal
     */
    public static function converter(): Converter
    {
        if (isset(self::$converter)) {
            return self::$converter;
        }

        $class = new \ReflectionClass(static::class);

        return self::$converter = new ModelOf($class);
    }

    /**
     * @internal
     */
    private function initialize(): void
    {
        static::converter();

        foreach (self::$converter->properties as $name => $info) {
            if ($info->optional) {
                unset($this->{$name});
            }
        }
    }

    /**
     * @internal
     */
    private static function serialize(mixed $value): mixed
    {
        if ($value instanceof BaseModel) {
            return $value->toProperties();
        }

        if (is_array($value)) {
            return array_map(static fn ($v) => self::serialize($v), array: $value);
        }

        return $value;
    }
}
