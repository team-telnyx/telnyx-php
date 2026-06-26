<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params\TelnyxUltraClone;

/**
 * TTS model identifier. Must be `Ultra`.
 */
enum ModelID: string
{
    case ULTRA = 'Ultra';
}
