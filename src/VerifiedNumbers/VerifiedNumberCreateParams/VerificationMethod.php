<?php

declare(strict_types=1);

namespace Telnyx\VerifiedNumbers\VerifiedNumberCreateParams;

/**
 * Verification method.
 */
enum VerificationMethod: string
{
    case SMS = 'sms';

    case CALL = 'call';
}
