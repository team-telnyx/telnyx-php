<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallMachinePremiumDetectionStartedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_MACHINE_PREMIUM_DETECTION_STARTED = 'call.machine.premium.detection.started';
}
