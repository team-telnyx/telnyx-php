<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineSpeechmaticsConfig;

/**
 * Engine identifier for Speechmatics transcription service.
 */
enum TranscriptionEngine: string
{
    case SPEECHMATICS = 'Speechmatics';
}
