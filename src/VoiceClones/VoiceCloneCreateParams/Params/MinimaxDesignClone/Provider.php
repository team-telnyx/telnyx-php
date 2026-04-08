<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateParams\Params\MinimaxDesignClone;

/**
 * Voice synthesis provider. Must be `minimax`.
 */
enum Provider: string
{
    case MINIMAX = 'minimax';

    case MINIMAX1 = 'Minimax';
}
