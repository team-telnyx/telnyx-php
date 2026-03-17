<?php

declare(strict_types=1);

namespace Telnyx\SpeechToText\SpeechToTextTranscribeParams;

/**
 * The specific model to use within the selected transcription engine.
 */
enum Model: string
{
    case FAST = 'fast';

    case DEEPGRAM_NOVA_2 = 'deepgram/nova-2';

    case DEEPGRAM_NOVA_3 = 'deepgram/nova-3';

    case LATEST_LONG = 'latest_long';

    case LATEST_SHORT = 'latest_short';

    case COMMAND_AND_SEARCH = 'command_and_search';

    case PHONE_CALL = 'phone_call';

    case VIDEO = 'video';

    case DEFAULT = 'default';

    case MEDICAL_CONVERSATION = 'medical_conversation';

    case MEDICAL_DICTATION = 'medical_dictation';

    case OPENAI_WHISPER_TINY = 'openai/whisper-tiny';

    case OPENAI_WHISPER_LARGE_V3_TURBO = 'openai/whisper-large-v3-turbo';
}
