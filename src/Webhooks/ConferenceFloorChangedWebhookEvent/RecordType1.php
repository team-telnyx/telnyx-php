<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceFloorChangedWebhookEvent;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case EVENT = 'event';
}
