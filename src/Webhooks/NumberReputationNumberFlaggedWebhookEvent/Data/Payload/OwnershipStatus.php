<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberReputationNumberFlaggedWebhookEvent\Data\Payload;

enum OwnershipStatus: string
{
    case PENDING_CONFIRMATION = 'pending_confirmation';
}
