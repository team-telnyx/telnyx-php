<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineHumainConfig;

/**
 * Engine identifier for Humain transcription service.
 */
enum TranscriptionEngine: string
{
    case HUMAIN = 'Humain';
}
