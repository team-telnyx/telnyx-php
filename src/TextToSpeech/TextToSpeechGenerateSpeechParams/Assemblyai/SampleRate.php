<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Assemblyai;

/**
 * Audio sample rate in Hz. Defaults to 24000, or 8000 for `pcm_mulaw` and `pcm_alaw`.
 */
enum SampleRate: int
{
    case SAMPLE_RATE_8000 = 8000;

    case SAMPLE_RATE_16000 = 16000;

    case SAMPLE_RATE_22050 = 22050;

    case SAMPLE_RATE_24000 = 24000;

    case SAMPLE_RATE_44100 = 44100;

    case SAMPLE_RATE_48000 = 48000;
}
