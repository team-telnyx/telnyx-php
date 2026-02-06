<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TelephonySettings\RecordingSettings;

/**
 * The format of the recording file.
 */
enum Format: string
{
    case WAV = 'wav';

    case MP3 = 'mp3';
}
