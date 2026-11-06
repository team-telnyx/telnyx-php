<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections\CalendarConnection;

/**
 * all_meetings joins eligible events; external_organizer_excluded requires the connected user to be the organizer; per_meeting requires an explicit opt-in.
 */
enum AutoJoinPolicy: string
{
    case ALL_MEETINGS = 'all_meetings';

    case EXTERNAL_ORGANIZER_EXCLUDED = 'external_organizer_excluded';

    case PER_MEETING = 'per_meeting';
}
