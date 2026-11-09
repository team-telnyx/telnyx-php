<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\ResembleClone;

/**
 * Voice synthesis provider. Must be `resemble`.
 */
enum Provider: string
{
    case RESEMBLE = 'resemble';
}
