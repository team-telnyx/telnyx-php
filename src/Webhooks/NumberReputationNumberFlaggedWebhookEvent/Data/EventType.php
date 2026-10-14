<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberReputationNumberFlaggedWebhookEvent\Data;

enum EventType: string
{
    case NUMBER_REPUTATION_NUMBER_FLAGGED = 'number_reputation.number.flagged';
}
