<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\MessagingProfile;

/**
 * Identifies the type of the resource.
 */
enum RecordType: string
{
    case MESSAGING_PROFILE = 'messaging_profile';
}
