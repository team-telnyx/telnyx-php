<?php

declare(strict_types=1);

namespace Telnyx\Dir\VerifyEmail\VerifyEmailStatusResponse\Data;

/**
 * `sent` after a code is emailed; `verified` after a successful confirm; `unverified` when no verification is in progress.
 */
enum Status: string
{
    case SENT = 'sent';

    case VERIFIED = 'verified';

    case UNVERIFIED = 'unverified';
}
