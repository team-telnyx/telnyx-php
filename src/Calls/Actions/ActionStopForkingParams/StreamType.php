<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStopForkingParams;

/**
 * Optionally specify a `stream_type`. This should match the `stream_type` that was used in `fork_start` command to properly stop the fork.
 */
enum StreamType: string
{
    case RAW = 'raw';

    case DECRYPTED = 'decrypted';
}
