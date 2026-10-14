<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TranscriptionSettings\Challenger;

/**
 * The language booster's model. It must be the same kind of model as `transcription.model`: both streaming (`deepgram/flux`, `deepgram/nova-3`, `deepgram/nova-2`, `assemblyai/universal-3-5-pro` or its legacy alias `assemblyai/universal-streaming`, `xai/grok-stt`, `soniox/stt-rt-v4`, `soniox/stt-rt-v5`, `humain/realtime`, `reson8/turns`) or both non-streaming (`azure/fast`, `nvidia/parakeet-v3`, `omi-health/omi-med-stt-v1`, `cohere/ar-stt`, `distil-whisper/distil-large-v2`, `openai/whisper-large-v3-turbo`, `telnyx/basira`). It can be the same model as `transcription.model` on a different `language`.
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

    case TELNYX_BASIRA = 'telnyx/basira';

    case DISTIL_WHISPER_DISTIL_LARGE_V2 = 'distil-whisper/distil-large-v2';

    case OPENAI_WHISPER_LARGE_V3_TURBO = 'openai/whisper-large-v3-turbo';
}
