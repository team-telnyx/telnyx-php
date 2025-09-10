<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartPlaybackParams;

/**
 * Specifies the type of audio provided in `audio_url` or `playback_content`.
 */
enum AudioType: string
{
    case MP3 = 'mp3';

    case WAV = 'wav';
}
