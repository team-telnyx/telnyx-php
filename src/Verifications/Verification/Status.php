<?php

declare(strict_types=1);

namespace Telnyx\Verifications\Verification;

/**
 * The possible statuses of the verification request.
 */
enum Status: string
{
    case PENDING = 'pending';

    case ACCEPTED = 'accepted';

    case INVALID = 'invalid';

    case EXPIRED = 'expired';

    case ERROR = 'error';
}
