<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice\CallRecording;

/**
 * When using 'dual' channels, final audio file will be stereo recorded with the first leg on channel A, and the rest on channel B.
 */
enum InboundCallRecordingChannels: string
{
    case SINGLE = 'single';

    case DUAL = 'dual';
}
