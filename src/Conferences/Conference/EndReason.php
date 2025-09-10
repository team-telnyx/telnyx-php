<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Conference;

/**
 * Reason why the conference ended.
 */
enum EndReason: string
{
    case ALL_LEFT = 'all_left';

    case ENDED_VIA_API = 'ended_via_api';

    case HOST_LEFT = 'host_left';

    case TIME_EXCEEDED = 'time_exceeded';
}
