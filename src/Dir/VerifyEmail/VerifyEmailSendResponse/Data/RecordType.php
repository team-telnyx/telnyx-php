<?php

declare(strict_types=1);

namespace Telnyx\Dir\VerifyEmail\VerifyEmailSendResponse\Data;

/**
 * Always `email_verification`.
 */
enum RecordType: string
{
    case EMAIL_VERIFICATION = 'email_verification';
}
