<?php

declare(strict_types=1);

namespace Telnyx\UserProfile\UserProfilePatchAllParams;

/**
 * Low-balance notification frequency. Organization sub-users cannot set a non-null frequency. The resulting profile must have both a threshold and frequency, or neither.
 */
enum LowBalanceNotificationFrequency: int
{
    case FREQUENCY_2 = 2;

    case FREQUENCY_4 = 4;

    case FREQUENCY_12 = 12;

    case FREQUENCY_24 = 24;
}
