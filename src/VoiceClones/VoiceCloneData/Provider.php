<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneData;

/**
 * Voice synthesis provider used for this clone.
 */
enum Provider: string
{
    case TELNYX = 'telnyx';

    case MINIMAX = 'minimax';
}
