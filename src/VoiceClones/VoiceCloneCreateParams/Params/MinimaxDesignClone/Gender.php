<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateParams\Params\MinimaxDesignClone;

/**
 * Gender of the voice clone.
 */
enum Gender: string
{
    case MALE = 'male';

    case FEMALE = 'female';

    case NEUTRAL = 'neutral';
}
