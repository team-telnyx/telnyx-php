<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceRecordingSaved;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CONFERENCE_RECORDING_SAVED = 'conference.recording.saved';
}
