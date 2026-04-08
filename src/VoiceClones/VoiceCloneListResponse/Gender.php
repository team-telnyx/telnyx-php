<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneListResponse;

/**
 * Gender of the voice clone.
 */
enum Gender: string
{
    case MALE = 'male';

    case FEMALE = 'female';

    case NEUTRAL = 'neutral';
}
