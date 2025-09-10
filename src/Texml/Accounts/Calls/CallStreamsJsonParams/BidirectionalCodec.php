<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams;

/**
 * Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
 */
enum BidirectionalCodec: string
{
    case PCMU = 'PCMU';

    case PCMA = 'PCMA';

    case G722 = 'G722';
}
