<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallPaymentProgressWebhookEvent\Data\Payload;

/**
 * Payment method being collected.
 */
enum PaymentMethod: string
{
    case CREDIT_CARD = 'credit-card';

    case ACH_DEBIT = 'ach-debit';
}
