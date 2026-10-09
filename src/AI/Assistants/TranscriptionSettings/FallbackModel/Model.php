<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TranscriptionSettings\FallbackModel;

/**
 * The fallback model. It must be a streaming model other than `transcription.model` and the other fallbacks: `deepgram/flux`, `deepgram/nova-3`, `deepgram/nova-2`, `assemblyai/universal-3-5-pro` (or its legacy alias `assemblyai/universal-streaming`), `xai/grok-stt`, `soniox/stt-rt-v4`, `soniox/stt-rt-v5`, `humain/realtime`, or `reson8/turns`.
 */
enum Model: string
{
    case DEEPGRAM_FLUX = 'deepgram/flux';

    case DEEPGRAM_NOVA_3 = 'deepgram/nova-3';

    case DEEPGRAM_NOVA_2 = 'deepgram/nova-2';

    case ASSEMBLYAI_UNIVERSAL_3_5_PRO = 'assemblyai/universal-3-5-pro';

    case ASSEMBLYAI_UNIVERSAL_STREAMING = 'assemblyai/universal-streaming';

    case XAI_GROK_STT = 'xai/grok-stt';

    case SONIOX_STT_RT_V4 = 'soniox/stt-rt-v4';

    case SONIOX_STT_RT_V5 = 'soniox/stt-rt-v5';

    case HUMAIN_REALTIME = 'humain/realtime';

    case RESON8_TURNS = 'reson8/turns';
}
