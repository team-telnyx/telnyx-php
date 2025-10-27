<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferencePlaybackEndedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CONFERENCE_PLAYBACK_ENDED = 'conference.playback.ended';
}
