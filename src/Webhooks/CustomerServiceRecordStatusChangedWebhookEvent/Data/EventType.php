<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CustomerServiceRecordStatusChangedWebhookEvent\Data;

/**
 * The type of the callback event.
 */
enum EventType: string
{
    case CUSTOMER_SERVICE_RECORD_STATUS_CHANGED = 'customer_service_record.status_changed';
}
