<?php

declare(strict_types=1);

namespace Telnyx\Core\Conversion;

use Telnyx\Core\Conversion\Concerns\ArrayOf;
use Telnyx\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class ListOf implements Converter
{
    use ArrayOf;

    private function empty(): array|object // @phpstan-ignore-line
    {
        return [];
    }
}
