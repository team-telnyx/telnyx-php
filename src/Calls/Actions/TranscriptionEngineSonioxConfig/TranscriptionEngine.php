<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineSonioxConfig;

/**
 * Engine identifier for Soniox transcription service.
 */
enum TranscriptionEngine: string
{
    case SONIOX = 'Soniox';
}
