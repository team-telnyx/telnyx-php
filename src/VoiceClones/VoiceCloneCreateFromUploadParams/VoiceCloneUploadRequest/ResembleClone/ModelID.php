<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\ResembleClone;

/**
 * Resemble model: `Pro`, `Turbo` (English only), or `Urdu`. A clone works only with this model.
 */
enum ModelID: string
{
    case PRO = 'Pro';

    case TURBO = 'Turbo';

    case URDU = 'Urdu';
}
