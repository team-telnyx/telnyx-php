<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberReputationNumberFlaggedWebhookEvent\Data\Payload;

enum RecordType: string
{
    case REPUTATION_PHONE_NUMBER = 'reputation_phone_number';
}
