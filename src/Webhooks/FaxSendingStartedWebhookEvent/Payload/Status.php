<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxSendingStartedWebhookEvent\Payload;

/**
 * The status of the fax.
 */
enum Status: string
{
    case SENDING = 'sending';
}
