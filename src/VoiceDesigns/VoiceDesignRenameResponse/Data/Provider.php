<?php

declare(strict_types=1);

namespace Telnyx\VoiceDesigns\VoiceDesignRenameResponse\Data;

/**
 * Voice synthesis provider used for this design.
 */
enum Provider: string
{
    case TELNYX = 'telnyx';

    case MINIMAX = 'minimax';

    case TELNYX1 = 'Telnyx';

    case MINIMAX1 = 'Minimax';
}
