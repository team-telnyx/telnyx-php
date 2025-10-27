<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceSpeakEndedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CONFERENCE_SPEAK_ENDED = 'conference.speak.ended';
}
