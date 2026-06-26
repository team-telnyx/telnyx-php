<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateParams\VoiceCloneRequest\MinimaxDesignClone;

/**
 * Voice synthesis provider. Must be `minimax`.
 */
enum Provider: string
{
    case TELNYX = 'telnyx';

    case MINIMAX = 'minimax';
}
