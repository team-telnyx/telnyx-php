<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineAConfig;

/**
 * The model to use for transcription.
 */
enum Model: string
{
    case LATEST_LONG = 'latest_long';

    case LATEST_SHORT = 'latest_short';

    case COMMAND_AND_SEARCH = 'command_and_search';

    case PHONE_CALL = 'phone_call';

    case VIDEO = 'video';

    case DEFAULT = 'default';

    case MEDICAL_CONVERSATION = 'medical_conversation';

    case MEDICAL_DICTATION = 'medical_dictation';
}
