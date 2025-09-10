<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxDeliveredWebhookEvent;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case FAX_DELIVERED = 'fax.delivered';
}
