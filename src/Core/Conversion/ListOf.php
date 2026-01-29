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

    // @phpstan-ignore-next-line missingType.iterableValue
    private function empty(): array|object
    {
        return [];
    }
}
