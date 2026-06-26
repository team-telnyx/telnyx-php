<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechRetrieveSpeechParams;

/**
 * Audio output format override. Supported for Telnyx models. `pcm` and `wav` are available for `Natural`/`NaturalHD` models. The `Ultra` model outputs PCM at 24kHz s16le or MP3 at 128kbps 24kHz.
 */
enum AudioFormat: string
{
    case PCM = 'pcm';

    case WAV = 'wav';

    case MP3 = 'mp3';
}
