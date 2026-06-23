<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\TranscriptionEngineParakeetConfig;

/**
 * Engine identifier for Parakeet transcription service.
 */
enum TranscriptionEngine: string
{
    case PARAKEET = 'Parakeet';
}
