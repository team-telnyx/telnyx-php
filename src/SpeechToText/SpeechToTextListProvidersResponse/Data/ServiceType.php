<?php

declare(strict_types=1);

namespace Telnyx\SpeechToText\SpeechToTextListProvidersResponse\Data;

/**
 * Service surface a model is available on.
 */
enum ServiceType: string
{
    case STREAMING = 'streaming';

    case FILE_TRANSCRIPTION = 'file_transcription';

    case IN_CALL_TRANSCRIPTION = 'in_call_transcription';
}
