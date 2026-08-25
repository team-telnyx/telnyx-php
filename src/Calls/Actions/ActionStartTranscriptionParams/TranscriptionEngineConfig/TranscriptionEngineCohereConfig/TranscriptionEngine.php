<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\TranscriptionEngineCohereConfig;

/**
 * Engine identifier for Cohere transcription service.
 */
enum TranscriptionEngine: string
{
    case COHERE = 'Cohere';
}
