<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\UnionMember1;

/**
 * Provide a direct URL to an MP3 file. The audio will loop during the call.
 */
enum Type: string
{
    case MEDIA_URL = 'media_url';
}
