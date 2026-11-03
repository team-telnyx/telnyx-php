<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Assemblyai;

/**
 * Audio sample rate in Hz. Defaults to 24000, or 8000 for `pcm_mulaw` and `pcm_alaw`.
 */
enum SampleRate: int
{
    case _8000 = 8000;

    case _16000 = 16000;

    case _22050 = 22050;

    case _24000 = 24000;

    case _44100 = 44100;

    case _48000 = 48000;
}
