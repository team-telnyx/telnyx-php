<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxQueuedWebhookEvent;

/**
 * Identifies the type of the resource.
 */
enum RecordType1: string
{
    case EVENT = 'event';
}
