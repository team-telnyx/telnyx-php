<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceFloorChangedWebhookEvent;

/**
 * Identifies the type of the resource.
 */
enum RecordType1: string
{
    case EVENT = 'event';
}
