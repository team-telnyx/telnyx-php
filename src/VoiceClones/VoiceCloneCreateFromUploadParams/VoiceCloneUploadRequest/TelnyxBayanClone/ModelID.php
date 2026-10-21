<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\TelnyxBayanClone;

/**
 * TTS model identifier. Must be `Bayan`.
 */
enum ModelID: string
{
    case BAYAN = 'Bayan';
}
