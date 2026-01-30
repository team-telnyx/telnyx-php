<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartRecordingParams;

/**
 * Engine to use for speech recognition. `A` - `Google`, `B` - `Telnyx`, `deepgram/nova-3` - `Deepgram Nova-3`. Note: `deepgram/nova-3` supports only `en` and `en-{Region}` languages.
 */
enum TranscriptionEngine: string
{
    case A = 'A';

    case B = 'B';

    case DEEPGRAM_NOVA_3 = 'deepgram/nova-3';
}
