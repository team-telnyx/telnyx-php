<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberReputationExternalVerificationStatusChangedWebhookEvent\Data\Payload;

enum RecordType: string
{
    case REPUTATION_EXTERNAL_VERIFICATION = 'reputation_external_verification';
}
