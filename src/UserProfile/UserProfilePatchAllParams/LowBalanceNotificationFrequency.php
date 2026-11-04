<?php

declare(strict_types=1);

namespace Telnyx\UserProfile\UserProfilePatchAllParams;

/**
 * Low-balance notification frequency. Organization sub-users cannot set a non-null frequency. The resulting profile must have both a threshold and frequency, or neither.
 */
enum LowBalanceNotificationFrequency: int
{
    case _2 = 2;

    case _4 = 4;

    case _12 = 12;

    case _24 = 24;
}
