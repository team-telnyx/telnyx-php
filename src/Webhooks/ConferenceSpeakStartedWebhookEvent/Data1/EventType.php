<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceSpeakStartedWebhookEvent\Data1;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CONFERENCE_SPEAK_STARTED = 'conference.speak.started';
}
