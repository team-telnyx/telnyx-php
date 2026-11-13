<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallCallsParams\Body\WithTeXml;

/**
 * Indicates the codec for bidirectional streaming RTP payloads. Used only with `StreamBidirectionalMode=rtp`. Case sensitive. Requires `StreamUrl`.
 */
enum StreamBidirectionalCodec: string
{
    case PCMU = 'PCMU';

    case PCMA = 'PCMA';

    case G722 = 'G722';

    case OPUS = 'OPUS';

    case AMR_WB = 'AMR-WB';

    case L16 = 'L16';
}
