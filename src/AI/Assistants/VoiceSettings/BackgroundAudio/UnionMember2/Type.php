<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\UnionMember2;

/**
 * Reference a previously uploaded media by its name from Telnyx Media Storage.
 */
enum Type: string
{
    case MEDIA_NAME = 'media_name';
}
