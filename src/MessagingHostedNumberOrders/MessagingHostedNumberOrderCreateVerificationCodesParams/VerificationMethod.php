<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateVerificationCodesParams;

enum VerificationMethod: string
{
    case SMS = 'sms';

    case CALL = 'call';

    case FLASHCALL = 'flashcall';
}
