<?php

declare(strict_types=1);

namespace Telnyx\Core\Concerns;

use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion;
use Telnyx\Core\Conversion\CoerceState;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\ModelOf;
use Telnyx\Core\Util;

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
        $rows = [...Util::get_object_vars($this), ...$this->_data]; // @phpstan-ignore-line

        return array_map(static fn ($v) => self::serialize($v), array: $rows);
    }

    /**
     * @internal
     *
     * @param array<string, mixed> $data
     */
    public function __unserialize(array $data): void
    {
        foreach ($data as $key => $value) {
            $this->offsetSet($key, value: $value); // @phpstan-ignore-line
        }
    }

    /**
     * @internal
     *
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
        return $this->__serialize();
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
     * @return value-of<Shape>
     *
     * @throws \Exception
     */
    public function __get(string $key): mixed
    {
        if (!array_key_exists($key, array: self::$converter->properties)) {
            throw new \RuntimeException("Property '{$key}' does not exist in {$this}::class");
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
        return null; // @phpstan-ignore-line
    }

    /**
     * @return Shape
     */
    public function toArray(): array
    {
        return $this->__serialize(); // @phpstan-ignore-line
    }

    /**
     * @internal
     *
     * @param key-of<Shape> $offset
     */
    public function offsetExists(mixed $offset): bool
    {
        if (!is_string($offset)) { // @phpstan-ignore-line
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
        if (!is_string($offset)) { // @phpstan-ignore-line
            throw new \InvalidArgumentException;
        }

        if (!$this->offsetExists($offset)) { // @phpstan-ignore-line
            return null; // @phpstan-ignore-line
        }

        if (array_key_exists($offset, array: $this->_data)) {
            return $this->_data[$offset]; // @phpstan-ignore-line
        }

        return $this->{$offset}; // @phpstan-ignore-line
    }

    /**
     * @internal
     *
     * @param key-of<Shape> $offset
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!is_string($offset)) { // @phpstan-ignore-line
            throw new \InvalidArgumentException;
        }

        $type = array_key_exists($offset, array: self::$converter->properties)
            ? self::$converter->properties[$offset]->type
            : 'mixed';

        $coerced = Conversion::coerce($type, value: $value, state: new CoerceState(translateNames: false));

        if (property_exists($this, property: $offset)) { // @phpstan-ignore-line
            try {
                $this->{$offset} = $coerced; // @phpstan-ignore-line
                unset($this->_data[$offset]);

                return;
            } catch (\TypeError) { // @phpstan-ignore-line
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
        if (!is_string($offset)) { // @phpstan-ignore-line
            throw new \InvalidArgumentException;
        }

        if (property_exists($this, property: $offset)) { // @phpstan-ignore-line
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
        // @phpstan-ignore-next-line
        return Conversion::dump(self::converter(), value: $this->__serialize());
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): static
    {
        return self::converter()->from($data); // @phpstan-ignore-line
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
            return $value->toArray();
        }

        if (is_array($value)) {
            return array_map(static fn ($v) => self::serialize($v), array: $value);
        }

        return $value;
    }
}
