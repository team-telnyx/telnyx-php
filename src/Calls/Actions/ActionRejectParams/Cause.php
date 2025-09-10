<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionRejectParams;

/**
 * Cause for call rejection.
 */
enum Cause: string
{
    case CALL_REJECTED = 'CALL_REJECTED';

    case USER_BUSY = 'USER_BUSY';
}
