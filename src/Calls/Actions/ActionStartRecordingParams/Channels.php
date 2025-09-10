<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartRecordingParams;

/**
 * When `dual`, final audio file will be stereo recorded with the first leg on channel A, and the rest on channel B.
 */
enum Channels: string
{
    case SINGLE = 'single';

    case DUAL = 'dual';
}
