<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneListParams;

/**
 * Filter by voice synthesis provider. Case-insensitive.
 */
enum FilterProvider: string
{
    case TELNYX = 'telnyx';

    case MINIMAX = 'minimax';

    case TELNYX1 = 'Telnyx';

    case MINIMAX1 = 'Minimax';
}
