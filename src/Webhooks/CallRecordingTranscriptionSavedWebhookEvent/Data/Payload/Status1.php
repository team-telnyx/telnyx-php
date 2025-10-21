<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallRecordingTranscriptionSavedWebhookEvent\Data\Payload;

/**
 * The transcription status.
 */
enum Status: string
{
    case COMPLETED = 'completed';
}
