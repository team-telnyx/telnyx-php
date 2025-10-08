<?php

declare(strict_types=1);

namespace Telnyx\Core\Conversion;

use Telnyx\Core\Conversion;
use Telnyx\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class EnumOf implements Converter
{
    private readonly string $type;

    /**
     * @param list<bool|float|int|string|null> $members
     */
    public function __construct(private readonly array $members)
    {
        $type = 'NULL';
        foreach ($this->members as $member) {
            $type = gettype($member);
        }
        $this->type = $type;
    }

    public function coerce(mixed $value, CoerceState $state): mixed
    {
        if (in_array($value, haystack: $this->members, strict: true)) {
            ++$state->yes;
        } elseif ($this->type === gettype($value)) {
            ++$state->maybe;
        } else {
            ++$state->no;
        }

        return $value;
    }

    public function dump(mixed $value, DumpState $state): mixed
    {
        return Conversion::dump_unknown($value, state: $state);
    }
}
