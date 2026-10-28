<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionConfig;

/**
 * The speech to text model to be used by the voice assistant. Supported models include:
 *
 * - `deepgram/flux` (or `flux`) for live streaming turn-taking.
 * - `deepgram/nova-3` and `deepgram/nova-2` for live streaming transcription.
 * - `speechmatics/standard` and `speechmatics/enhanced` for live streaming transcription.
 * - `speechmatics/linden-1` (preview, vendor-hosted) for live streaming transcription; no auto-detect, so set `language` from Speechmatics' Realtime language list (defaults to `en`).
 * - `assemblyai/universal-3-6-pro` (AssemblyAI Universal-3.6 Pro) for live streaming transcription. The legacy aliases `assemblyai/universal-3-5-pro` and `assemblyai/universal-streaming` are still accepted and run the same Universal-3.6 Pro model.
 * - `xai/grok-stt` for live streaming transcription.
 * - `soniox/stt-rt-v4` for live streaming multilingual transcription with automatic language detection.
 * - `nvidia/parakeet-v3` for multilingual transcription with automatic language detection.
 * - `omi-health/omi-med-stt-v1` for English-only medical transcription (Parakeet-based).
 * - `humain/realtime` for live streaming transcription with native Arabic and Arabic/English code-switching support.
 * - `reson8/turns` for live streaming turn-based transcription of 10 European languages with automatic language detection.
 * - `cohere/ar-stt` for non-streaming Arabic and English transcription.
 * - `azure/fast` and `azure/realtime`; Azure models require `region`, and unsupported regions require `api_key_ref`.
 * - `google/latest_long` for non-streaming multilingual transcription.
 * - `distil-whisper/distil-large-v2` for lower-latency English-only non-streaming transcription.
 * - `openai/whisper-large-v3-turbo` for multilingual non-streaming transcription with automatic language detection.
 */
enum Model: string
{
    case DEEPGRAM_FLUX = 'deepgram/flux';

    case FLUX = 'flux';

    case DEEPGRAM_NOVA_3 = 'deepgram/nova-3';

    case DEEPGRAM_NOVA_2 = 'deepgram/nova-2';

    case SPEECHMATICS_STANDARD = 'speechmatics/standard';

    case SPEECHMATICS_ENHANCED = 'speechmatics/enhanced';

    case SPEECHMATICS_LINDEN_1 = 'speechmatics/linden-1';

    case ASSEMBLYAI_UNIVERSAL_3_6_PRO = 'assemblyai/universal-3-6-pro';

    case ASSEMBLYAI_UNIVERSAL_3_5_PRO = 'assemblyai/universal-3-5-pro';

    case ASSEMBLYAI_UNIVERSAL_STREAMING = 'assemblyai/universal-streaming';

    case XAI_GROK_STT = 'xai/grok-stt';

    case SONIOX_STT_RT_V4 = 'soniox/stt-rt-v4';

    case NVIDIA_PARAKEET_V3 = 'nvidia/parakeet-v3';

    case OMI_HEALTH_OMI_MED_STT_V1 = 'omi-health/omi-med-stt-v1';

    case HUMAIN_REALTIME = 'humain/realtime';

    case RESON8_TURNS = 'reson8/turns';

    case COHERE_AR_STT = 'cohere/ar-stt';

    case AZURE_FAST = 'azure/fast';

    case AZURE_REALTIME = 'azure/realtime';

    case GOOGLE_LATEST_LONG = 'google/latest_long';

    case DISTIL_WHISPER_DISTIL_LARGE_V2 = 'distil-whisper/distil-large-v2';

    case OPENAI_WHISPER_LARGE_V3_TURBO = 'openai/whisper-large-v3-turbo';
}
