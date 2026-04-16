<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallDeepfakeDetectionResultWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_DEEPFAKE_DETECTION_RESULT = 'call.deepfake_detection.result';
}
