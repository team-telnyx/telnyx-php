<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceParticipantJoined;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case EVENT = 'event';
}
