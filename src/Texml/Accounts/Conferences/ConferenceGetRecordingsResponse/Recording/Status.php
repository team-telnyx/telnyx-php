<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsResponse\Recording;

/**
 * The status of the recording.
 */
enum Status: string
{
    case PROCESSING = 'processing';

    case ABSENT = 'absent';

    case COMPLETED = 'completed';

    case DELETED = 'deleted';
}
