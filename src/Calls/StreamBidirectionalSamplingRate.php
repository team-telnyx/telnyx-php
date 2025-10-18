<?php

declare(strict_types=1);

namespace Telnyx\Calls;

/**
 * Audio sampling rate.
 */
enum StreamBidirectionalSamplingRate: int
{
    case _8000 = 8000;

    case _16000 = 16000;

    case _22050 = 22050;

    case _24000 = 24000;

    case _48000 = 48000;
}
