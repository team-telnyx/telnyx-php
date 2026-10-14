<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionRejectParams;

/**
 * Cause for call rejection. The cause sets the SIP response the caller receives: `USER_BUSY` sends 486 User Busy, `CALL_REJECTED` sends 603 Decline, `NOT_FOUND` sends 404 Not Found, and `TEMPORARILY_UNAVAILABLE` sends 480 Temporarily Unavailable.
 */
enum Cause: string
{
    case CALL_REJECTED = 'CALL_REJECTED';

    case NOT_FOUND = 'NOT_FOUND';

    case TEMPORARILY_UNAVAILABLE = 'TEMPORARILY_UNAVAILABLE';

    case USER_BUSY = 'USER_BUSY';
}
