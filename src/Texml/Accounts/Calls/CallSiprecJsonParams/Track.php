<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallSiprecJsonParams;

/**
 * The track to be used for siprec session. Can be `both_tracks`, `inbound_track` or `outbound_track`. Defaults to `both_tracks`.
 */
enum Track: string
{
    case BOTH_TRACKS = 'both_tracks';

    case INBOUND_TRACK = 'inbound_track';

    case OUTBOUND_TRACK = 'outbound_track';
}
