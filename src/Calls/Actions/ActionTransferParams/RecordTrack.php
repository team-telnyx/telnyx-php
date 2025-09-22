<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionTransferParams;

/**
 * The audio track to be recorded. Can be either `both`, `inbound` or `outbound`. If only single track is specified (`inbound`, `outbound`), `channels` configuration is ignored and it will be recorded as mono (single channel).
 */
enum RecordTrack: string
{
    case BOTH = 'both';

    case INBOUND = 'inbound';

    case OUTBOUND = 'outbound';
}
