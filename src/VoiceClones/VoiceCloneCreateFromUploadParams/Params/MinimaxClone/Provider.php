<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params\MinimaxClone;

/**
 * Voice synthesis provider. Must be `minimax`.
 */
enum Provider: string
{
    case MINIMAX = 'minimax';

    case MINIMAX1 = 'Minimax';
}
