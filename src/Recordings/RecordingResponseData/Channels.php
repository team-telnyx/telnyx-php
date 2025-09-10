<?php

declare(strict_types=1);

namespace Telnyx\Recordings\RecordingResponseData;

/**
 * When `dual`, the final audio file has the first leg on channel A, and the rest on channel B.
 */
enum Channels: string
{
    case SINGLE = 'single';

    case DUAL = 'dual';
}
