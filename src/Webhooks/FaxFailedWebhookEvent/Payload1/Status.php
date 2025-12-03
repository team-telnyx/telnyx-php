<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxFailedWebhookEvent\Payload1;

/**
 * The status of the fax.
 */
enum Status: string
{
    case FAILED = 'failed';
}
