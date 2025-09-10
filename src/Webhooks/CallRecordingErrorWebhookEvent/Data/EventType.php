<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallRecordingErrorWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_RECORDING_ERROR = 'call.recording.error';
}
