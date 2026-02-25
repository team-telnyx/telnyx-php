<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionGatherUsingSpeakParams\VoiceSettings\ResembleVoiceSettings;

/**
 * Audio sample rate in Hz.
 */
enum SampleRate: string
{
    case _8000 = '8000';

    case _16000 = '16000';

    case _22050 = '22050';

    case _32000 = '32000';

    case _44100 = '44100';

    case _48000 = '48000';
}
