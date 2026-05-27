<?php

declare(strict_types=1);

namespace Telnyx\SpeechToText\SpeechToTextListProvidersParams;

/**
 * Filter to entries that support the given service type.
 */
enum ServiceType: string
{
    case STREAMING = 'streaming';

    case FILE_TRANSCRIPTION = 'file_transcription';

    case IN_CALL_TRANSCRIPTION = 'in_call_transcription';
}
