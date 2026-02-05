<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferencePlaybackStarted;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CONFERENCE_PLAYBACK_STARTED = 'conference.playback.started';
}
