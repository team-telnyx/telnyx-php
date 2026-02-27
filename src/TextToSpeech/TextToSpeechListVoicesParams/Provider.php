<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechListVoicesParams;

/**
 * Filter voices by provider. If omitted, voices from all providers are returned.
 */
enum Provider: string
{
    case AWS = 'aws';

    case TELNYX = 'telnyx';

    case AZURE = 'azure';

    case ELEVENLABS = 'elevenlabs';

    case MINIMAX = 'minimax';

    case RIME = 'rime';

    case RESEMBLE = 'resemble';
}
