<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\TranscriptionEngineSpeechmaticsConfig;

/**
 * Engine identifier for Speechmatics transcription service.
 */
enum TranscriptionEngine: string
{
    case SPEECHMATICS = 'Speechmatics';
}
