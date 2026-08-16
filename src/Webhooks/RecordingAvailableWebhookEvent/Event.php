<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\RecordingAvailableWebhookEvent;

/**
 * Event type.
 */
enum Event: string
{
    case RECORDING_AVAILABLE = 'recording.available';
}
