<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\TranscriptionWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_TRANSCRIPTION = 'call.transcription';
}
