<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceParticipantJoined;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CONFERENCE_PARTICIPANT_JOINED = 'conference.participant.joined';
}
