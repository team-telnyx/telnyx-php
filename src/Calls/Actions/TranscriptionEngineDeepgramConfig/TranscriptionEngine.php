<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig;

/**
 * Engine identifier for Deepgram transcription service.
 */
enum TranscriptionEngine: string
{
    case DEEPGRAM = 'Deepgram';
}
