<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineTelnyxConfig;

/**
 * Engine identifier for Telnyx transcription service.
 */
enum TranscriptionEngine: string
{
    case TELNYX = 'Telnyx';
}
