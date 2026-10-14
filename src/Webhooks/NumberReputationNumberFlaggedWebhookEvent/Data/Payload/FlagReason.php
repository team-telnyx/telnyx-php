<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberReputationNumberFlaggedWebhookEvent\Data\Payload;

/**
 * `carrier_changed`: the number moved to a different carrier. `reverification_due`: the periodic ownership re-verification is due.
 */
enum FlagReason: string
{
    case CARRIER_CHANGED = 'carrier_changed';

    case REVERIFICATION_DUE = 'reverification_due';
}
