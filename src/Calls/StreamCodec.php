<?php

declare(strict_types=1);

namespace Telnyx\Calls;

/**
 * Specifies the codec to be used for the streamed audio. When set to 'default' or when transcoding is not possible, the codec from the call will be used. Currently, transcoding is only supported between PCMU and PCMA codecs.
 */
enum StreamCodec: string
{
    case PCMA = 'PCMA';

    case PCMU = 'PCMU';

    case DEFAULT = 'default';
}
