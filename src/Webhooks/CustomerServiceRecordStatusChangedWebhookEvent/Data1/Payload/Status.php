<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CustomerServiceRecordStatusChangedWebhookEvent\Data1\Payload;

/**
 * The status of the customer service record.
 */
enum Status: string
{
    case PENDING = 'pending';

    case COMPLETED = 'completed';

    case FAILED = 'failed';
}
