<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechCreateSpeechParams\Xai;

/**
 * Audio output format.
 */
enum OutputFormat: string
{
    case MP3 = 'mp3';

    case WAV = 'wav';

    case PCM = 'pcm';

    case MULAW = 'mulaw';

    case ALAW = 'alaw';
}
