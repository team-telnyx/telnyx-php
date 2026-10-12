<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberReputationNumberRemovedWebhookEvent\Data\Payload;

enum RecordType: string
{
    case REPUTATION_PHONE_NUMBER = 'reputation_phone_number';
}
