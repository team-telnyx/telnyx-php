<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallRecordingSavedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_RECORDING_SAVED = 'call.recording.saved';
}
