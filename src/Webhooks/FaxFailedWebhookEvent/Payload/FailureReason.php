<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxFailedWebhookEvent\Payload;

/**
 * Cause of the sending failure.
 */
enum FailureReason: string
{
    case REJECTED = 'rejected';
}
