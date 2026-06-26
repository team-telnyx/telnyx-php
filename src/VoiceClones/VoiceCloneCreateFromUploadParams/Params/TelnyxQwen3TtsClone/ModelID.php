<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params\TelnyxQwen3TtsClone;

/**
 * TTS model identifier. Nullable/omittable — defaults to Qwen3TTS.
 */
enum ModelID: string
{
    case QWEN3_TTS = 'Qwen3TTS';
}
