<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxMediaProcessedWebhookEvent\Payload1;

/**
 * The direction of the fax.
 */
enum Direction: string
{
    case INBOUND = 'inbound';

    case OUTBOUND = 'outbound';
}
