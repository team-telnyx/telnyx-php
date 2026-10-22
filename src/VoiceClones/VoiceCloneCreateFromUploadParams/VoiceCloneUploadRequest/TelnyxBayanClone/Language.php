<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\TelnyxBayanClone;

/**
 * Language of the reference audio: `ar` (Arabic) or `en` (English). Defaults to `ar`. Other values return `422`.
 */
enum Language: string
{
    case AR = 'ar';

    case EN = 'en';
}
