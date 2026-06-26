<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineXaiConfig;

/**
 * Engine identifier for xAI transcription service.
 */
enum TranscriptionEngine: string
{
    case X_AI = 'xAI';
}
