<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartTranscriptionParams;

/**
 * Engine to use for speech recognition. Legacy values `A` - `Google`, `B` - `Telnyx` are supported for backward compatibility.
 */
enum TranscriptionEngine: string
{
    case GOOGLE = 'Google';

    case TELNYX = 'Telnyx';

    case DEEPGRAM = 'Deepgram';

    case A = 'A';

    case B = 'B';
}
