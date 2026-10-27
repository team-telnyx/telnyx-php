<?php

declare(strict_types=1);

namespace Telnyx\Addresses\Actions\ActionValidateResponse\Data;

enum Result: string
{
    case VALID = 'valid';

    case INVALID = 'invalid';
}
