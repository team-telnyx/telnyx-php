<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxFailedWebhookEvent\Payload1;

/**
 * Cause of the sending failure.
 */
enum FailureReason: string
{
    case REJECTED = 'rejected';
}
