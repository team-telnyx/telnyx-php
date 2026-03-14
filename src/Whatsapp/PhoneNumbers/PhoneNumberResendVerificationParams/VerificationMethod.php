<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\PhoneNumberResendVerificationParams;

enum VerificationMethod: string
{
    case SMS = 'sms';

    case VOICE = 'voice';
}
