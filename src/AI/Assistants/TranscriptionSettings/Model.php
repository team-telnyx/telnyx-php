<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TranscriptionSettings;

/**
 * The speech to text model to be used by the voice assistant. All the deepgram models are run on-premise.
 *
 * - `deepgram/flux` is optimized for turn-taking but is English-only.
 * - `deepgram/nova-3` is multi-lingual with automatic language detection but slightly higher latency.
 */
enum Model: string
{
    case DEEPGRAM_FLUX = 'deepgram/flux';

    case DEEPGRAM_NOVA_3 = 'deepgram/nova-3';

    case DEEPGRAM_NOVA_2 = 'deepgram/nova-2';

    case AZURE_FAST = 'azure/fast';

    case DISTIL_WHISPER_DISTIL_LARGE_V2 = 'distil-whisper/distil-large-v2';

    case OPENAI_WHISPER_LARGE_V3_TURBO = 'openai/whisper-large-v3-turbo';
}
