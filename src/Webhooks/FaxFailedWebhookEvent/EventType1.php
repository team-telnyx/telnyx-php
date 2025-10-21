<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxFailedWebhookEvent;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case FAX_FAILED = 'fax.failed';
}
