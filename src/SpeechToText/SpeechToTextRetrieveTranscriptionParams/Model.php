<?php

declare(strict_types=1);

namespace Telnyx\SpeechToText\SpeechToTextRetrieveTranscriptionParams;

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

    case XAI_GROK_STT = 'xai/grok-stt';

    case SPEECHMATICS_STANDARD = 'speechmatics/standard';

    case SONIOX_STT_RT_V4 = 'soniox/stt-rt-v4';

    case PARAKEET_TDT_0_6B_V3 = 'parakeet/tdt-0.6b-v3';
}
