<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxMediaProcessedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case FAX_MEDIA_PROCESSED = 'fax.media.processed';
}
