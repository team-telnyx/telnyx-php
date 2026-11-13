<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallCallsParams\Body\ApplicationDefault;

/**
 * Configures the method of bidirectional streaming: `mp3` or `rtp`. Requires `StreamUrl`.
 */
enum StreamBidirectionalMode: string
{
    case MP3 = 'mp3';

    case RTP = 'rtp';
}
