<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineAzureConfig;

/**
 * Engine identifier for Azure transcription service.
 */
enum TranscriptionEngine: string
{
    case AZURE = 'Azure';
}
