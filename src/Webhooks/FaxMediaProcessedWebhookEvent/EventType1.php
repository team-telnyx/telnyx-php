<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxMediaProcessedWebhookEvent;

/**
 * The type of event being delivered.
 */
enum EventType1: string
{
    case FAX_MEDIA_PROCESSED = 'fax.media.processed';
}
