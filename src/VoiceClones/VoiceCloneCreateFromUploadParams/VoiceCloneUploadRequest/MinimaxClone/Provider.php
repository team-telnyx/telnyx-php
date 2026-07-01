<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\MinimaxClone;

/**
 * Voice synthesis provider. Must be `minimax`.
 */
enum Provider: string
{
    case TELNYX = 'telnyx';

    case MINIMAX = 'minimax';
}
