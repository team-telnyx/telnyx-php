<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\UploadParams\TelnyxUltraClone;

/**
 * TTS model identifier. Must be `Ultra`.
 */
enum ModelID: string
{
    case ULTRA = 'Ultra';
}
