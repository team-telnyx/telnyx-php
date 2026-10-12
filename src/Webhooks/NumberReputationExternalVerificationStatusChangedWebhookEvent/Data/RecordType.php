<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberReputationExternalVerificationStatusChangedWebhookEvent\Data;

enum RecordType: string
{
    case EVENT = 'event';
}
