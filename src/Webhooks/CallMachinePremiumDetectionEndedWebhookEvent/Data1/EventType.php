<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallMachinePremiumDetectionEndedWebhookEvent\Data1;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_MACHINE_PREMIUM_DETECTION_ENDED = 'call.machine.premium.detection.ended';
}
