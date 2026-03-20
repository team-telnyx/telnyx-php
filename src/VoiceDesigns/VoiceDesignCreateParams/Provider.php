<?php

declare(strict_types=1);

namespace Telnyx\VoiceDesigns\VoiceDesignCreateParams;

/**
 * Voice synthesis provider. `telnyx` uses the Qwen3TTS model; `minimax` uses the Minimax speech models. Case-insensitive. Defaults to `telnyx`.
 */
enum Provider: string
{
    case TELNYX = 'telnyx';

    case MINIMAX = 'minimax';

    case TELNYX1 = 'Telnyx';

    case MINIMAX1 = 'Minimax';
}
