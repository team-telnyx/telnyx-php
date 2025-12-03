<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceEndedWebhookEvent\Data1;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CONFERENCE_ENDED = 'conference.ended';
}
