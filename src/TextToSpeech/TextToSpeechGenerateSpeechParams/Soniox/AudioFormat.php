<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Soniox;

/**
 * Audio output format.
 */
enum AudioFormat: string
{
    case MP3 = 'mp3';

    case WAV = 'wav';

    case PCM_S16LE = 'pcm_s16le';

    case PCM_MULAW = 'pcm_mulaw';

    case PCM_ALAW = 'pcm_alaw';
}
