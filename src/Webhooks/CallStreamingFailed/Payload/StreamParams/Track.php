<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallStreamingFailed\Payload\StreamParams;

/**
 * Specifies which track should be streamed.
 */
enum Track: string
{
    case INBOUND_TRACK = 'inbound_track';

    case OUTBOUND_TRACK = 'outbound_track';

    case BOTH_TRACKS = 'both_tracks';
}
