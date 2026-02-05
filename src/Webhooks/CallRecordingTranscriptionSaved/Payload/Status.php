<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallRecordingTranscriptionSaved\Payload;

/**
 * The transcription status.
 */
enum Status: string
{
    case COMPLETED = 'completed';
}
