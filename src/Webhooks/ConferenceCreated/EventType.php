<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceCreated;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CONFERENCE_CREATED = 'conference.created';
}
