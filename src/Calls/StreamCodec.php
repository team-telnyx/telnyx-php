<?php

declare(strict_types=1);

namespace Telnyx\Calls;

/**
 * Specifies the codec to be used for the streamed audio. When set to 'default' or when transcoding is not possible, the codec from the call will be used.
 */
enum StreamCodec: string
{
    case PCMU = 'PCMU';

    case PCMA = 'PCMA';

    case G722 = 'G722';

    case OPUS = 'OPUS';

    case AMR_WB = 'AMR-WB';

    case L16 = 'L16';

    case DEFAULT = 'default';
}
