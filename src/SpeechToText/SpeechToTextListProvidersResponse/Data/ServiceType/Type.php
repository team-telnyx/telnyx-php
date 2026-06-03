<?php

declare(strict_types=1);

namespace Telnyx\SpeechToText\SpeechToTextListProvidersResponse\Data\ServiceType;

/**
 * Service surface a model is available on. `ai_assistant` is the STT surface configured via Call Control voice-assistant transcription; it covers both live-streaming and non-streaming/batch models (matching the `TranscriptionConfig.model` enum on `call-control` voice assistants).
 */
enum Type: string
{
    case STREAMING = 'streaming';

    case FILE_BASED = 'file_based';

    case IN_CALL = 'in_call';

    case AI_ASSISTANT = 'ai_assistant';
}
