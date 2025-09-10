<?php

declare(strict_types=1);

namespace Telnyx\Calls;

/**
 * Configures method of bidirectional streaming (mp3, rtp).
 */
enum StreamBidirectionalMode: string
{
    case MP3 = 'mp3';

    case RTP = 'rtp';
}
