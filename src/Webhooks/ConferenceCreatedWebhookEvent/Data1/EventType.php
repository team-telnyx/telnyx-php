<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceCreatedWebhookEvent\Data1;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CONFERENCE_CREATED = 'conference.created';
}
