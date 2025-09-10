<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceFloorChangedWebhookEvent;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CONFERENCE_FLOOR_CHANGED = 'conference.floor.changed';
}
