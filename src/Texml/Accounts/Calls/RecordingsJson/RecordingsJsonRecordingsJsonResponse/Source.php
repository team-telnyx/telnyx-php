<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonResponse;

/**
 * Defines how the recording was created.
 */
enum Source: string
{
    case START_CALL_RECORDING_API = 'StartCallRecordingAPI';

    case START_CONFERENCE_RECORDING_API = 'StartConferenceRecordingAPI';

    case OUTBOUND_API = 'OutboundAPI';

    case DIAL_VERB = 'DialVerb';

    case CONFERENCE = 'Conference';

    case RECORD_VERB = 'RecordVerb';

    case TRUNKING = 'Trunking';
}
