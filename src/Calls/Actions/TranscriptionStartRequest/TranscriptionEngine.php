<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest;

/**
 * Engine to use for speech recognition. `A` - `Google`, `B` - `Telnyx`.
 */
enum TranscriptionEngine: string
{
    case A = 'A';

    case B = 'B';
}
