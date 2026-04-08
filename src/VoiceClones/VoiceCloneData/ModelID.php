<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneData;

/**
 * TTS model identifier for the voice clone.
 */
enum ModelID: string
{
    case QWEN3_TTS = 'Qwen3TTS';

    case ULTRA = 'Ultra';

    case SPEECH_2_8_TURBO = 'speech-2.8-turbo';
}
