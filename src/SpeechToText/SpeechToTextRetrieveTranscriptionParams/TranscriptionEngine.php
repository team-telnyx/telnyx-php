<?php

declare(strict_types=1);

namespace Telnyx\SpeechToText\SpeechToTextRetrieveTranscriptionParams;

/**
 * The transcription engine to use for processing the audio stream.
 */
enum TranscriptionEngine: string
{
    case AZURE = 'Azure';

    case DEEPGRAM = 'Deepgram';

    case GOOGLE = 'Google';

    case TELNYX = 'Telnyx';

    case X_AI = 'xAI';

    case SPEECHMATICS = 'Speechmatics';

    case SONIOX = 'Soniox';

    case PARAKEET = 'Parakeet';

    case HUMAIN = 'Humain';
}
