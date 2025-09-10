<?php

declare(strict_types=1);

namespace Telnyx\Core\Conversion;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion;
use Telnyx\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class ModelOf implements Converter
{
    /**
     * @var array<string, PropertyInfo>
     */
    public readonly array $properties;

    /**
     * @param \ReflectionClass<BaseModel> $class
     */
    public function __construct(public readonly \ReflectionClass $class)
    {
        $properties = [];

        foreach ($this->class->getProperties() as $property) {
            if (!empty($property->getAttributes(Api::class))) {
                $name = $property->getName();
                $properties[$name] = new PropertyInfo($property);
            }
        }
        $this->properties = $properties;
    }

    public function coerce(mixed $value, CoerceState $state): mixed
    {
        if ($value instanceof $this->class->name) {
            ++$state->yes;

            return $value;
        }

        if (!is_array($value) || (!empty($value) && array_is_list($value))) {
            ++$state->no;

            return $value;
        }

        ++$state->yes;

        $val = [...$value];
        $acc = [];

        foreach ($this->properties as $name => $info) {
            $srcName = $state->translateNames ? $info->apiName : $name;
            if (!array_key_exists($srcName, array: $val)) {
                if ($info->optional) {
                    ++$state->yes;
                } elseif ($info->nullable) {
                    ++$state->maybe;
                } else {
                    ++$state->no;
                }

                continue;
            }

            $item = $val[$srcName];
            unset($val[$srcName]);

            if (is_null($item) && ($info->nullable || $info->optional)) {
                if ($info->nullable) {
                    ++$state->yes;
                } elseif ($info->optional) {
                    ++$state->maybe;
                }
                $acc[$name] = null;
            } else {
                $coerced = Conversion::coerce($info->type, value: $item, state: $state);
                $acc[$name] = $coerced;
            }
        }

        foreach ($val as $name => $item) {
            $acc[$name] = $item;
        }

        return $this->from($acc); // @phpstan-ignore-line
    }

    /**
     * @param array<string, mixed> $data
     */
    public function from(array $data): BaseModel
    {
        $instance = $this->class->newInstanceWithoutConstructor();
        $instance->__unserialize($data); // @phpstan-ignore-line

        return $instance;
    }

    public function dump(mixed $value, DumpState $state): mixed
    {
        if ($value instanceof BaseModel) {
            $value = $value->toArray();
        }

        if (is_array($value)) {
            $acc = [];

            foreach ($value as $name => $item) {
                if (array_key_exists($name, array: $this->properties)) {
                    $info = $this->properties[$name];
                    $acc[$info->apiName] = Conversion::dump($info->type, value: $item, state: $state);
                } else {
                    $acc[$name] = Conversion::dump_unknown($item, state: $state);
                }
            }

            return empty($acc) ? ((object) []) : $acc;
        }

        return Conversion::dump_unknown($value, state: $state);
    }
}
