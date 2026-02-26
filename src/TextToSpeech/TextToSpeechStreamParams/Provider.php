<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechStreamParams;

/**
 * TTS provider. Defaults to `telnyx` if not specified. Ignored when `voice` is provided.
 */
enum Provider: string
{
    case AWS = 'aws';

    case TELNYX = 'telnyx';

    case AZURE = 'azure';

    case ELEVENLABS = 'elevenlabs';

    case MINIMAX = 'minimax';

    case MURFAI = 'murfai';

    case RIME = 'rime';

    case RESEMBLE = 'resemble';
}
