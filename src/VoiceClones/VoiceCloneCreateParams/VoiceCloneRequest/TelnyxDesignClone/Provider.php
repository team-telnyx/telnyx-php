<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateParams\VoiceCloneRequest\TelnyxDesignClone;

/**
 * Voice synthesis provider. Defaults to `telnyx`.
 */
enum Provider: string
{
    case TELNYX = 'telnyx';

    case MINIMAX = 'minimax';
}
