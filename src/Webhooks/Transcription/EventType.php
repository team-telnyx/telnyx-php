<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\Transcription;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_TRANSCRIPTION = 'call.transcription';
}
