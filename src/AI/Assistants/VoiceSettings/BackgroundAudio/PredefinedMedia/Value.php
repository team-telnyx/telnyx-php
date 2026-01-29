<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\PredefinedMedia;

/**
 * The predefined media to use. `silence` disables background audio.
 */
enum Value: string
{
    case SILENCE = 'silence';

    case OFFICE = 'office';
}
