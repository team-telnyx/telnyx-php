<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxQueuedWebhookEvent\Data\Payload;

/**
 * The status of the fax.
 */
enum Status: string
{
    case QUEUED = 'queued';
}
