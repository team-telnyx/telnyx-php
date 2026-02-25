<?php

declare(strict_types=1);

namespace Telnyx\ResembleVoiceSettings;

/**
 * Audio precision format.
 */
enum Precision: string
{
    case PCM_16 = 'PCM_16';

    case PCM_24 = 'PCM_24';

    case PCM_32 = 'PCM_32';

    case MULAW = 'MULAW';
}
