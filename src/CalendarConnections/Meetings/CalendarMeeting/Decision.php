<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections\Meetings\CalendarMeeting;

/**
 * Scheduling decision.
 */
enum Decision: string
{
    case PENDING = 'pending';

    case SCHEDULED = 'scheduled';

    case SKIPPED_POLICY = 'skipped_policy';

    case SKIPPED_NO_URL = 'skipped_no_url';

    case SKIPPED_DUPLICATE = 'skipped_duplicate';

    case SKIPPED_UNSUPPORTED = 'skipped_unsupported';

    case CANCELLED = 'cancelled';
}
