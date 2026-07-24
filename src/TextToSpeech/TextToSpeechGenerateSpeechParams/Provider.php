<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams;

/**
 * TTS provider. Required unless `voice` is provided.
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

    case XAI = 'xai';

    case HUMAIN = 'humain';
}
