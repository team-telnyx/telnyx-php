<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceSpeakStarted;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CONFERENCE_SPEAK_STARTED = 'conference.speak.started';
}
