<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceParticipantPlaybackStartedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CONFERENCE_PARTICIPANT_PLAYBACK_STARTED = 'conference.participant.playback.started';
}
