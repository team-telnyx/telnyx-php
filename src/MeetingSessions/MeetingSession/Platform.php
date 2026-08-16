<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSession;

/**
 * Detected meeting platform.
 */
enum Platform: string
{
    case ZOOM = 'zoom';

    case GOOGLE_MEET = 'google_meet';

    case TEAMS = 'teams';

    case WEBEX = 'webex';

    case UNKNOWN = 'unknown';
}
