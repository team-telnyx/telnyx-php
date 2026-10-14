<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberReputationExternalVerificationStatusChangedWebhookEvent\Data\Payload;

/**
 * The review outcome. `pending` is never delivered: the event is sent only once the proof is reviewed.
 */
enum Status: string
{
    case APPROVED = 'approved';

    case REJECTED = 'rejected';
}
