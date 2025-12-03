<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallSpeakEndedWebhookEvent\Data1;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_SPEAK_ENDED = 'call.speak.ended';
}
