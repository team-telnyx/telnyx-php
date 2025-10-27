<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallRecordingTranscriptionSavedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_RECORDING_TRANSCRIPTION_SAVED = 'call.recording.transcription.saved';
}
