<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberReputationNumberFlaggedWebhookEvent\Data;

enum RecordType: string
{
    case EVENT = 'event';
}
