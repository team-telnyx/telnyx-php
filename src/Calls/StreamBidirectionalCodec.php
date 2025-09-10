<?php

declare(strict_types=1);

namespace Telnyx\Calls;

/**
 * Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
 */
enum StreamBidirectionalCodec: string
{
    case PCMU = 'PCMU';

    case PCMA = 'PCMA';

    case G722 = 'G722';

    case OPUS = 'OPUS';

    case AMR_WB = 'AMR-WB';
}
