<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\TranscriptionEngineSpeechmaticsConfig;

/**
 * The model to use for transcription.
 */
enum TranscriptionModel: string
{
    case SPEECHMATICS_STANDARD = 'speechmatics/standard';
}
