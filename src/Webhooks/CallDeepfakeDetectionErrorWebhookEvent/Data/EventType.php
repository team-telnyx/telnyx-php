<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallDeepfakeDetectionErrorWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_DEEPFAKE_DETECTION_ERROR = 'call.deepfake_detection.error';
}
