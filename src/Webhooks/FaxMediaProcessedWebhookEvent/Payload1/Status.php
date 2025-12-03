<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxMediaProcessedWebhookEvent\Payload1;

/**
 * The status of the fax.
 */
enum Status: string
{
    case MEDIA_PROCESSED = 'media.processed';
}
