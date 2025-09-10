<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartForkingParams;

/**
 * Optionally specify a media type to stream. If `decrypted` selected, Telnyx will decrypt incoming SIP media before forking to the target. `rx` and `tx` are required fields if `decrypted` selected.
 */
enum StreamType: string
{
    case DECRYPTED = 'decrypted';
}
