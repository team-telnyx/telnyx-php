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
 * - `assemblyai/universal-3-5-pro` is a multilingual streaming model with configurable turn detection. The legacy alias `assemblyai/universal-streaming` is still accepted and resolves to the same model.
 * - `xai/grok-stt` is a multilingual Grok STT model.
 * - `soniox/stt-rt-v4` and `soniox/stt-rt-v5` are multilingual streaming models with automatic language detection, configurable endpointing, term biasing (`context`), and `language_hints`.
 * - `nvidia/parakeet-v3` is a multilingual transcription model with automatic language detection.
 * - `omi-health/omi-med-stt-v1` is an English-only medical transcription model (Parakeet-based).
 * - `humain/realtime` is a streaming model with native Arabic and Arabic/English code-switching support.
 * - `reson8/turns` is a turn-based streaming model covering 10 European languages with automatic language detection.
 * - `cohere/ar-stt` is a non-streaming Arabic and English transcription model.
 */
enum Model: string
{
    case DEEPGRAM_FLUX = 'deepgram/flux';

    case DEEPGRAM_NOVA_3 = 'deepgram/nova-3';

    case DEEPGRAM_NOVA_2 = 'deepgram/nova-2';

    case AZURE_FAST = 'azure/fast';

    case ASSEMBLYAI_UNIVERSAL_3_5_PRO = 'assemblyai/universal-3-5-pro';

    case ASSEMBLYAI_UNIVERSAL_STREAMING = 'assemblyai/universal-streaming';

    case XAI_GROK_STT = 'xai/grok-stt';

    case SONIOX_STT_RT_V4 = 'soniox/stt-rt-v4';

    case SONIOX_STT_RT_V5 = 'soniox/stt-rt-v5';

    case NVIDIA_PARAKEET_V3 = 'nvidia/parakeet-v3';

    case OMI_HEALTH_OMI_MED_STT_V1 = 'omi-health/omi-med-stt-v1';

    case HUMAIN_REALTIME = 'humain/realtime';

    case RESON8_TURNS = 'reson8/turns';

    case COHERE_AR_STT = 'cohere/ar-stt';

    case DISTIL_WHISPER_DISTIL_LARGE_V2 = 'distil-whisper/distil-large-v2';

    case OPENAI_WHISPER_LARGE_V3_TURBO = 'openai/whisper-large-v3-turbo';
}
