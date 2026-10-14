<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberReputationExternalVerificationStatusChangedWebhookEvent\Data;

enum EventType: string
{
    case NUMBER_REPUTATION_EXTERNAL_VERIFICATION_STATUS_CHANGED = 'number_reputation.external_verification.status_changed';
}
