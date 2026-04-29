<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\TranscriptionEngineAssemblyaiConfig;

/**
 * The model to use for transcription.
 */
enum TranscriptionModel: string
{
    case ASSEMBLYAI_UNIVERSAL_STREAMING = 'assemblyai/universal-streaming';
}
