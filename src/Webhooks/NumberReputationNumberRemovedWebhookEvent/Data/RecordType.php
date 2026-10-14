<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberReputationNumberRemovedWebhookEvent\Data;

enum RecordType: string
{
    case EVENT = 'event';
}
