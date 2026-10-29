<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\TelnyxBayanClone;

/**
 * Voice synthesis provider. Defaults to `telnyx`.
 */
enum Provider: string
{
    case TELNYX = 'telnyx';
}
