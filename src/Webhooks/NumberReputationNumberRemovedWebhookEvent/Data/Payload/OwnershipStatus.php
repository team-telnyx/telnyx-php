<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberReputationNumberRemovedWebhookEvent\Data\Payload;

enum OwnershipStatus: string
{
    case REMOVED = 'removed';
}
