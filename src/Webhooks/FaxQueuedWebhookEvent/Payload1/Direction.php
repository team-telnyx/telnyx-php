<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxQueuedWebhookEvent\Payload1;

/**
 * The direction of the fax.
 */
enum Direction: string
{
    case INBOUND = 'inbound';

    case OUTBOUND = 'outbound';
}
