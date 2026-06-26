<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\TranscriptionEngineParakeetConfig;

/**
 * Engine identifier for Parakeet transcription service.
 */
enum TranscriptionEngine: string
{
    case PARAKEET = 'Parakeet';
}
