<?php

declare(strict_types=1);

namespace Telnyx\VoiceDesigns\VoiceDesignListResponse;

/**
 * Voice synthesis provider used for this design.
 */
enum Provider: string
{
    case TELNYX = 'telnyx';

    case MINIMAX = 'minimax';
}
