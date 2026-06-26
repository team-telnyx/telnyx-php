<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params\TelnyxUltraClone;

/**
 * Voice synthesis provider. Must be `telnyx`.
 */
enum Provider: string
{
    case TELNYX = 'telnyx';

    case MINIMAX = 'minimax';
}
