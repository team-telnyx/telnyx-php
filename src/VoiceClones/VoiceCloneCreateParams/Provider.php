<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateParams;

/**
 * Voice synthesis provider. Case-insensitive. Defaults to `telnyx`.
 */
enum Provider: string
{
    case TELNYX = 'telnyx';

    case MINIMAX = 'minimax';
}
