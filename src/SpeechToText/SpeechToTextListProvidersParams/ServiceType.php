<?php

declare(strict_types=1);

namespace Telnyx\SpeechToText\SpeechToTextListProvidersParams;

/**
 * Filter to entries that support the given service type. For backward compatibility with the values that briefly shipped before the product-aligned rename, the legacy aliases `file_transcription`, `in_call_transcription`, and `ai_assistant_transcription` are silently accepted and normalized to `file_based`, `in_call`, and `ai_assistant` respectively. The response always emits the canonical (post-rename) values.
 */
enum ServiceType: string
{
    case STREAMING = 'streaming';

    case FILE_BASED = 'file_based';

    case IN_CALL = 'in_call';

    case AI_ASSISTANT = 'ai_assistant';
}
