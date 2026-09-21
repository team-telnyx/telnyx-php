<?php

declare(strict_types=1);

namespace Telnyx\Core\Conversion;

use Telnyx\Core\Conversion\Concerns\ArrayOf;
use Telnyx\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf { coerce as private coerceArray;
        dump as private dumpArray; }

    public function coerce(mixed $value, CoerceState $state): mixed
    {
        return $this->coerceArray($value instanceof \stdClass ? get_object_vars($value) : $value, $state);
    }

    public function dump(mixed $value, DumpState $state): mixed
    {
        $dumped = $this->dumpArray($value, $state);

        return is_array($dumped) ? (object) $dumped : $dumped;
    }
}
