<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSession;

/**
 * Lifecycle status. `waiting_for_admission` means the bot reached the meeting lobby and may require host approval. `active` means the bot entered the meeting/media path. `ended` alone does not prove attendance; use non-null `joined_at` as positive evidence that the session became active. `admission_denied` is reserved for an explicit provider denial, while cancellation or another termination can end a never-admitted session as `ended`.
 */
enum Status: string
{
    case SCHEDULED = 'scheduled';

    case JOINING = 'joining';

    case WAITING_FOR_ADMISSION = 'waiting_for_admission';

    case ACTIVE = 'active';

    case LEAVING = 'leaving';

    case ENDED = 'ended';

    case FAILED = 'failed';

    case ADMISSION_DENIED = 'admission_denied';
}
