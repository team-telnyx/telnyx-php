<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Xai;

/**
 * Audio sample rate in Hz.
 */
enum SampleRate: int
{
    case RATE_8000 = 8000;

    case RATE_16000 = 16000;

    case RATE_22050 = 22050;

    case RATE_24000 = 24000;

    case RATE_44100 = 44100;

    case RATE_48000 = 48000;
}
