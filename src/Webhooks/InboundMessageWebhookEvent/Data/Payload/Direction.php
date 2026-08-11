<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\InboundMessageWebhookEvent\Data\Payload;

/**
 * The direction of the message. Inbound messages are sent to you whereas outbound messages are sent from you.
 */
enum Direction: string
{
    case INBOUND = 'inbound';
}
