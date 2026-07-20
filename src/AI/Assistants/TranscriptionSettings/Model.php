<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TranscriptionSettings;

/**
 * The speech to text model to be used by the voice assistant. All Deepgram models are run on-premise.
 *
 * - `deepgram/flux` is optimized for turn-taking with multilingual language hints.
 * - `deepgram/nova-3` is multilingual with automatic language detection.
 * - `deepgram/nova-2` is Deepgram's previous-generation multilingual model.
 * - `azure/fast` is a multilingual Azure transcription model.
 * - `assemblyai/universal-streaming` is a multilingual streaming model with configurable turn detection.
 * - `xai/grok-stt` is a multilingual Grok STT model.
 * - `soniox/stt-rt-v4` is a multilingual streaming model with automatic language detection and configurable endpointing.
 * - `nvidia/parakeet-v3` is a multilingual transcription model with automatic language detection.
 */
enum Model: string
{
    case DEEPGRAM_FLUX = 'deepgram/flux';

    case DEEPGRAM_NOVA_3 = 'deepgram/nova-3';

    case DEEPGRAM_NOVA_2 = 'deepgram/nova-2';

    case AZURE_FAST = 'azure/fast';

    case ASSEMBLYAI_UNIVERSAL_STREAMING = 'assemblyai/universal-streaming';

    case XAI_GROK_STT = 'xai/grok-stt';

    case SONIOX_STT_RT_V4 = 'soniox/stt-rt-v4';

    case NVIDIA_PARAKEET_V3 = 'nvidia/parakeet-v3';

    case DISTIL_WHISPER_DISTIL_LARGE_V2 = 'distil-whisper/distil-large-v2';

    case OPENAI_WHISPER_LARGE_V3_TURBO = 'openai/whisper-large-v3-turbo';
}
