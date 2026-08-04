<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallPaymentProgressWebhookEvent\Data\Payload;

/**
 * Status of the current payment step.
 */
enum PaymentStatus: string
{
    case COMPLETED = 'completed';

    case FAILED = 'failed';

    case PROCESSING = 'processing';
}
