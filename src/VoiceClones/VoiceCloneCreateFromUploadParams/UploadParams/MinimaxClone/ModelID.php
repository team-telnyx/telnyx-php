<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\UploadParams\MinimaxClone;

/**
 * TTS model identifier. Nullable — defaults to speech-2.8-turbo.
 */
enum ModelID: string
{
    case SPEECH_2_8_TURBO = 'speech-2.8-turbo';
}
