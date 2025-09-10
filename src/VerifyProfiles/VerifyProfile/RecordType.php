<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles\VerifyProfile;

/**
 * The possible verification profile record types.
 */
enum RecordType: string
{
    case VERIFICATION_PROFILE = 'verification_profile';
}
