<?php

declare(strict_types=1);

namespace Telnyx\ResembleVoiceSettings;

/**
 * Audio sample rate in Hz.
 */
enum SampleRate: string
{
    case SAMPLE_RATE_8000 = '8000';

    case SAMPLE_RATE_16000 = '16000';

    case SAMPLE_RATE_22050 = '22050';

    case SAMPLE_RATE_32000 = '32000';

    case SAMPLE_RATE_44100 = '44100';

    case SAMPLE_RATE_48000 = '48000';
}
