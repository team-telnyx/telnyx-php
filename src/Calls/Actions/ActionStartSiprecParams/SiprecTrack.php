<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartSiprecParams;

/**
 * Specifies which track should be sent on siprec session.
 */
enum SiprecTrack: string
{
    case INBOUND_TRACK = 'inbound_track';

    case OUTBOUND_TRACK = 'outbound_track';

    case BOTH_TRACKS = 'both_tracks';
}
