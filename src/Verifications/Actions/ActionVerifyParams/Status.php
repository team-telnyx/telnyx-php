<?php

declare(strict_types=1);

namespace Telnyx\Verifications\Actions\ActionVerifyParams;

/**
 * Identifies if the verification code has been accepted or rejected. Only permitted if custom_code was used for the verification.
 */
enum Status: string
{
    case ACCEPTED = 'accepted';

    case REJECTED = 'rejected';
}
