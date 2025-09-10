<?php

declare(strict_types=1);

namespace Telnyx\AI\Audio\AudioTranscribeParams;

/**
 * ID of the model to use. `distil-whisper/distil-large-v2` is lower latency but English-only. `openai/whisper-large-v3-turbo` is multi-lingual but slightly higher latency.
 */
enum Model: string
{
    case DISTIL_WHISPER_DISTIL_LARGE_V2 = 'distil-whisper/distil-large-v2';

    case OPENAI_WHISPER_LARGE_V3_TURBO = 'openai/whisper-large-v3-turbo';
}
