<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneNewResponse\Data;

/**
 * Voice synthesis provider used for this clone.
 */
enum Provider: string
{
    case TELNYX = 'telnyx';

    case MINIMAX = 'minimax';

    case TELNYX1 = 'Telnyx';

    case MINIMAX1 = 'Minimax';
}
