<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSessionListParams;

/**
 * Filter meeting sessions by current status.
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
