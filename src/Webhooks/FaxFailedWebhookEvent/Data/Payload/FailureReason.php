<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxFailedWebhookEvent\Data\Payload;

/**
 * Cause of the sending failure.
 */
enum FailureReason: string
{
    case REJECTED = 'rejected';
}
