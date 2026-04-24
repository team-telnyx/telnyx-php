<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\HostedNumberOrderEventWebhookEvent\Data\Payload;

/**
 * Approval decision for the internal transfer. Defaults to `pending` for non-internal-transfer events.
 */
enum Decision: string
{
    case PENDING = 'pending';

    case APPROVED = 'approved';

    case REJECTED = 'rejected';
}
