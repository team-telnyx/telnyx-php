<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\VerifyEmail\EnterpriseEmailVerificationStatusWrapped\Data;

/**
 * Always `email_verification`.
 */
enum RecordType: string
{
    case EMAIL_VERIFICATION = 'email_verification';
}
