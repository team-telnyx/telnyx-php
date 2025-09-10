<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallSiprecJsonResponse;

/**
 * The track used for the siprec session.
 */
enum Track: string
{
    case BOTH_TRACKS = 'both_tracks';

    case INBOUND_TRACK = 'inbound_track';

    case OUTBOUND_TRACK = 'outbound_track';
}
