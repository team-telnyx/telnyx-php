<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\TranscriptionEngineCohereConfig;

/**
 * Engine identifier for Cohere transcription service.
 */
enum TranscriptionEngine: string
{
    case COHERE = 'Cohere';
}
