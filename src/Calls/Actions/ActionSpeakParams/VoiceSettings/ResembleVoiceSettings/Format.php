<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionSpeakParams\VoiceSettings\ResembleVoiceSettings;

/**
 * Output audio format.
 */
enum Format: string
{
    case WAV = 'wav';

    case MP3 = 'mp3';
}
