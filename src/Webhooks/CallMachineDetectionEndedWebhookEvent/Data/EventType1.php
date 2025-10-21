<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallMachineDetectionEndedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_MACHINE_DETECTION_ENDED = 'call.machine.detection.ended';
}
