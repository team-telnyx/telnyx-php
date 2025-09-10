<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceParticipantLeftWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CONFERENCE_PARTICIPANT_LEFT = 'conference.participant.left';
}
