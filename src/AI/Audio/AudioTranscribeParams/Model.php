<?php

declare(strict_types=1);

namespace Telnyx\AI\Audio\AudioTranscribeParams;

/**
 * ID of the model to use. `distil-whisper/distil-large-v2` is lower latency but English-only. `openai/whisper-large-v3-turbo` is multi-lingual but slightly higher latency. The `deepgram/*` models only accept mp3/wav files: `deepgram/nova-3` covers ~49 languages plus `multi` and `deepgram/nova-2` covers ~33, while the `-medical` variants are tuned for clinical vocabulary and accept English only (`en` and its regional variants, e.g. `en-US`, `en-GB`).
 */
enum Model: string
{
    case DISTIL_WHISPER_DISTIL_LARGE_V2 = 'distil-whisper/distil-large-v2';

    case OPENAI_WHISPER_LARGE_V3_TURBO = 'openai/whisper-large-v3-turbo';

    case DEEPGRAM_NOVA_2 = 'deepgram/nova-2';

    case DEEPGRAM_NOVA_2_MEDICAL = 'deepgram/nova-2-medical';

    case DEEPGRAM_NOVA_3 = 'deepgram/nova-3';

    case DEEPGRAM_NOVA_3_MEDICAL = 'deepgram/nova-3-medical';
}
