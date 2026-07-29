<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallPaymentCompletedWebhookEvent\Data\Payload;

/**
 * Final Pay session result.
 */
enum Result: string
{
    case SUCCESS = 'success';

    case PAYMENT_CONNECTOR_ERROR = 'payment-connector-error';

    case INTERNAL_ERROR = 'internal-error';

    case TOO_MANY_FAILED_ATTEMPTS = 'too-many-failed-attempts';

    case CANCELLED = 'cancelled';
}
