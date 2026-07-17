<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\InboundMessageWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case MESSAGE_RECEIVED = 'message.received';
}
