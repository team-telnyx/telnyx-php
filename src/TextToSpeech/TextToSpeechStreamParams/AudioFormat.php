<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechStreamParams;

/**
 * Audio output format override. Supported for Telnyx `Natural`/`NaturalHD` models only. Accepted values: `pcm`, `wav`.
 */
enum AudioFormat: string
{
    case PCM = 'pcm';

    case WAV = 'wav';
}
