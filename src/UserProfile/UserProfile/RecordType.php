<?php

declare(strict_types=1);

namespace Telnyx\UserProfile\UserProfile;

/**
 * Identifies the type of resource.
 */
enum RecordType: string
{
    case USER_PROFILE = 'user_profile';
}
