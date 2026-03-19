<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\BusinessAccounts\PhoneNumbers\PhoneNumberCreateVerificationParams;

enum VerificationMethod: string
{
    case SMS = 'sms';

    case VOICE = 'voice';
}
