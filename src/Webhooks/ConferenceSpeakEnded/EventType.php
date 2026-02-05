<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceSpeakEnded;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CONFERENCE_SPEAK_ENDED = 'conference.speak.ended';
}
