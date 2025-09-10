<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonParams;

/**
 * The audio track to record for the call. The default is `both`.
 */
enum RecordingTrack: string
{
    case INBOUND = 'inbound';

    case OUTBOUND = 'outbound';

    case BOTH = 'both';
}
