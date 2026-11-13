<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallCallsParams\Body\WithURL;

/**
 * Specifies which track should be streamed. Requires `StreamUrl`.
 */
enum StreamTrack: string
{
    case INBOUND_TRACK = 'inbound_track';

    case OUTBOUND_TRACK = 'outbound_track';

    case BOTH_TRACKS = 'both_tracks';
}
