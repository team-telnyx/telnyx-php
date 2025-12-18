<?php

declare(strict_types=1);

namespace Telnyx\SpeechToText\SpeechToTextTranscribeParams;

/**
 * The transcription engine to use for processing the audio stream.
 */
enum TranscriptionEngine: string
{
    case AZURE = 'Azure';

    case DEEPGRAM = 'Deepgram';

    case GOOGLE = 'Google';

    case TELNYX = 'Telnyx';
}
