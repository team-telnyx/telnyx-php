<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams;

/**
 * Tracks to be included in the stream.
 */
enum Track: string
{
    case INBOUND_TRACK = 'inbound_track';

    case OUTBOUND_TRACK = 'outbound_track';

    case BOTH_TRACKS = 'both_tracks';
}
