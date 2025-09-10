<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams;

/**
 * Configures method of bidirectional streaming (mp3, rtp).
 */
enum BidirectionalMode: string
{
    case MP3 = 'mp3';

    case RTP = 'rtp';
}
