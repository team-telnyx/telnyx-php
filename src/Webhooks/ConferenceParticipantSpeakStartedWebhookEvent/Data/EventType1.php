<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceParticipantSpeakStartedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CONFERENCE_PARTICIPANT_SPEAK_STARTED = 'conference.participant.speak.started';
}
