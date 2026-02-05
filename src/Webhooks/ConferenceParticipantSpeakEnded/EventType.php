<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceParticipantSpeakEnded;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CONFERENCE_PARTICIPANT_SPEAK_ENDED = 'conference.participant.speak.ended';
}
