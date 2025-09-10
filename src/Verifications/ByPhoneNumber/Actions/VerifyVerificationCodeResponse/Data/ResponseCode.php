<?php

declare(strict_types=1);

namespace Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse\Data;

/**
 * Identifies if the verification code has been accepted or rejected.
 */
enum ResponseCode: string
{
    case ACCEPTED = 'accepted';

    case REJECTED = 'rejected';
}
