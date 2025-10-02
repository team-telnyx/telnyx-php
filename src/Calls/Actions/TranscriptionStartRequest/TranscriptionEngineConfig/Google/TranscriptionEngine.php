<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Google;

/**
 * Engine identifier for Google transcription service.
 */
enum TranscriptionEngine: string
{
    case GOOGLE = 'Google';
}
