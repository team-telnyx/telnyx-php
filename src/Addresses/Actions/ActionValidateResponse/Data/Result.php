<?php

declare(strict_types=1);

namespace Telnyx\Addresses\Actions\ActionValidateResponse\Data;

/**
 * Indicates whether an address is valid or invalid.
 */
enum Result: string
{
    case VALID = 'valid';

    case INVALID = 'invalid';
}
