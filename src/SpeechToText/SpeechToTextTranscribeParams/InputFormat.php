<?php

declare(strict_types=1);

namespace Telnyx\SpeechToText\SpeechToTextTranscribeParams;

/**
 * The format of input audio stream.
 */
enum InputFormat: string
{
    case MP3 = 'mp3';

    case WAV = 'wav';
}
