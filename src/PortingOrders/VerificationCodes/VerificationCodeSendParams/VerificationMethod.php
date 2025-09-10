<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\VerificationCodes\VerificationCodeSendParams;

enum VerificationMethod: string
{
    case SMS = 'sms';

    case CALL = 'call';
}
