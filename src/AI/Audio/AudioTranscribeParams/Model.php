<?php

declare(strict_types=1);

namespace Telnyx\AI\Audio\AudioTranscribeParams;

/**
 * ID of the model to use. `distil-whisper/distil-large-v2` is lower latency but English-only. `openai/whisper-large-v3-turbo` is multi-lingual but slightly higher latency. `deepgram/nova-3` supports English variants (en, en-US, en-GB, en-AU, en-NZ, en-IN) and only accepts mp3/wav files.
 */
enum Model: string
{
    case DISTIL_WHISPER_DISTIL_LARGE_V2 = 'distil-whisper/distil-large-v2';

    case OPENAI_WHISPER_LARGE_V3_TURBO = 'openai/whisper-large-v3-turbo';

    case DEEPGRAM_NOVA_3 = 'deepgram/nova-3';
}
