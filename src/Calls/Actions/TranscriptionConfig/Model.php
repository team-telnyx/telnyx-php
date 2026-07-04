<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionConfig;

/**
 * The speech to text model to be used by the voice assistant. Supported models include:
 *
 * - `deepgram/flux` (or `flux`) for live streaming turn-taking.
 * - `deepgram/nova-3` and `deepgram/nova-2` for live streaming transcription.
 * - `speechmatics/standard` and `speechmatics/enhanced` for live streaming transcription.
 * - `assemblyai/universal-streaming` for live streaming transcription.
 * - `xai/grok-stt` for live streaming transcription.
 * - `soniox/stt-rt-v4` for live streaming multilingual transcription with automatic language detection.
 * - `parakeet/tdt-0.6b-v3` for multilingual transcription with automatic language detection.
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

    case ASSEMBLYAI_UNIVERSAL_STREAMING = 'assemblyai/universal-streaming';

    case XAI_GROK_STT = 'xai/grok-stt';

    case SONIOX_STT_RT_V4 = 'soniox/stt-rt-v4';

    case PARAKEET_TDT_0_6B_V3 = 'parakeet/tdt-0.6b-v3';

    case AZURE_FAST = 'azure/fast';

    case AZURE_REALTIME = 'azure/realtime';

    case GOOGLE_LATEST_LONG = 'google/latest_long';

    case DISTIL_WHISPER_DISTIL_LARGE_V2 = 'distil-whisper/distil-large-v2';

    case OPENAI_WHISPER_LARGE_V3_TURBO = 'openai/whisper-large-v3-turbo';
}
