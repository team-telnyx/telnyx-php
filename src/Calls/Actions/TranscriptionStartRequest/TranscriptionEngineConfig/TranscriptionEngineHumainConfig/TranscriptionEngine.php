<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\TranscriptionEngineHumainConfig;

/**
 * Engine identifier for Humain transcription service.
 */
enum TranscriptionEngine: string
{
    case HUMAIN = 'Humain';
}
