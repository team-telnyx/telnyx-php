<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineAssemblyaiConfig;

/**
 * Engine identifier for AssemblyAI transcription service.
 */
enum TranscriptionEngine: string
{
    case ASSEMBLY_AI = 'AssemblyAI';
}
