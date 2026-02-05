<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallSpeakStarted;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_SPEAK_STARTED = 'call.speak.started';
}
