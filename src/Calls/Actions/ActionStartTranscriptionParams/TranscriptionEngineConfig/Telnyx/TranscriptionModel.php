<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\Telnyx;

/**
 * The model to use for transcription.
 */
enum TranscriptionModel: string
{
    case OPENAI_WHISPER_TINY = 'openai/whisper-tiny';

    case OPENAI_WHISPER_LARGE_V3_TURBO = 'openai/whisper-large-v3-turbo';
}
