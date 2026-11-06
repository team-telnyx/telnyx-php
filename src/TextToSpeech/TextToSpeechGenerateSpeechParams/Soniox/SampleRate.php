<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Soniox;

/**
 * Audio sample rate in Hz. `pcm_mulaw` and `pcm_alaw` accept 8000 only; `mp3` does not accept 8000. Defaults to 24000, or 8000 for `pcm_mulaw` and `pcm_alaw`.
 */
enum SampleRate: int
{
    case SAMPLE_RATE_8000 = 8000;

    case SAMPLE_RATE_16000 = 16000;

    case SAMPLE_RATE_24000 = 24000;

    case SAMPLE_RATE_44100 = 44100;

    case SAMPLE_RATE_48000 = 48000;
}
