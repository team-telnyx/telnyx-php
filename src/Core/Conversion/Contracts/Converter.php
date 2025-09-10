<?php

declare(strict_types=1);

namespace Telnyx\Core\Conversion\Contracts;

use Telnyx\Core\Conversion\CoerceState;
use Telnyx\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
