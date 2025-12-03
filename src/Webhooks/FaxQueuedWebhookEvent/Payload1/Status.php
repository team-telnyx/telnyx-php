<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxQueuedWebhookEvent\Payload1;

/**
 * The status of the fax.
 */
enum Status: string
{
    case QUEUED = 'queued';
}
