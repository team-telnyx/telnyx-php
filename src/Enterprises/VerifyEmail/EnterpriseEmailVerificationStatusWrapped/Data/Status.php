<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\VerifyEmail\EnterpriseEmailVerificationStatusWrapped\Data;

/**
 * `sent` after a code is emailed; `verified` after a successful confirm.
 */
enum Status: string
{
    case SENT = 'sent';

    case VERIFIED = 'verified';
}
