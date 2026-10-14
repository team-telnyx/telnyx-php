<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappWabaAddedWebhookEvent\Data\Payload;

/**
 * Signup session outcome.
 */
enum Status: string
{
    case SUCCESS = 'SUCCESS';

    case FAILURE = 'FAILURE';
}
