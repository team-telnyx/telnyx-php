<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsResponse\Recording;

/**
 * How the recording was started.
 */
enum Source: string
{
    case DIAL_VERB = 'DialVerb';

    case CONFERENCE = 'Conference';

    case OUTBOUND_API = 'OutboundAPI';

    case TRUNKING = 'Trunking';

    case RECORD_VERB = 'RecordVerb';

    case START_CALL_RECORDING_API = 'StartCallRecordingAPI';

    case START_CONFERENCE_RECORDING_API = 'StartConferenceRecordingAPI';
}
