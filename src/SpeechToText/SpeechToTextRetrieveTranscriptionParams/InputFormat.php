<?php

declare(strict_types=1);

namespace Telnyx\SpeechToText\SpeechToTextRetrieveTranscriptionParams;

/**
 * The format of input audio stream.
 */
enum InputFormat: string
{
    case MP3 = 'mp3';

    case WAV = 'wav';

    case LINEAR16 = 'linear16';

    case LINEAR32 = 'linear32';
}
