<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallPaymentCompletedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_PAYMENT_COMPLETED = 'call.payment.completed';
}
