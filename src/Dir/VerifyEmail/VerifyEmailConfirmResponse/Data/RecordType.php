<?php

declare(strict_types=1);

namespace Telnyx\Dir\VerifyEmail\VerifyEmailConfirmResponse\Data;

/**
 * Always `email_verification`.
 */
enum RecordType: string
{
    case EMAIL_VERIFICATION = 'email_verification';
}
