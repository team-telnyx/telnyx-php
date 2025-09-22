<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartStreamingParams;

/**
 * Audio sampling rate.
 */
enum StreamBidirectionalSamplingRate: int
{
    case STREAM_BIDIRECTIONAL_SAMPLING_RATE_8000 = 8000;

    case STREAM_BIDIRECTIONAL_SAMPLING_RATE_16000 = 16000;

    case STREAM_BIDIRECTIONAL_SAMPLING_RATE_22050 = 22050;

    case STREAM_BIDIRECTIONAL_SAMPLING_RATE_24000 = 24000;

    case STREAM_BIDIRECTIONAL_SAMPLING_RATE_48000 = 48000;
}
