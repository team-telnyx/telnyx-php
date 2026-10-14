<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberReputationNumberRemovedWebhookEvent\Data;

enum EventType: string
{
    case NUMBER_REPUTATION_NUMBER_REMOVED = 'number_reputation.number.removed';
}
