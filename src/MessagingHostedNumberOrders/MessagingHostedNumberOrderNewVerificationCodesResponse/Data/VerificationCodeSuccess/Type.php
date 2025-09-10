<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse\Data\VerificationCodeSuccess;

/**
 * Type of verification method used.
 */
enum Type: string
{
    case SMS = 'sms';

    case CALL = 'call';

    case FLASHCALL = 'flashcall';
}
