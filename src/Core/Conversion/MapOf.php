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
    use ArrayOf;
}
