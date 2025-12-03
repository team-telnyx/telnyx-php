<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallMachinePremiumDetectionEndedWebhookEvent\Data1;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case EVENT = 'event';
}
