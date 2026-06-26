<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params\TelnyxQwen3TtsClone;

/**
 * Voice synthesis provider. Must be `telnyx`.
 */
enum Provider: string
{
    case TELNYX = 'telnyx';

    case MINIMAX = 'minimax';
}
