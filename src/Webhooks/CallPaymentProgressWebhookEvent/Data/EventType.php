<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallPaymentProgressWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_PAYMENT_PROGRESS = 'call.payment.progress';
}
