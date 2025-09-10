<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\DeliveryUpdateWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case MESSAGE_SENT = 'message.sent';

    case MESSAGE_FINALIZED = 'message.finalized';
}
