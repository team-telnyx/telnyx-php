<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAnswerParams;

/**
 * The list of comma-separated codecs in a preferred order for the forked media to be received.
 */
enum PreferredCodecs: string
{
    case G722_PCMU_PCMA_G729_OPUS_VP8_H264 = 'G722,PCMU,PCMA,G729,OPUS,VP8,H264';
}
