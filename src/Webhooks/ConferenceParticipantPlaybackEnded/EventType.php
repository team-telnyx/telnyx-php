<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceParticipantPlaybackEnded;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CONFERENCE_PARTICIPANT_PLAYBACK_ENDED = 'conference.participant.playback.ended';
}
