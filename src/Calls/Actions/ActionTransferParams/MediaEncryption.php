<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionTransferParams;

/**
 * Defines whether media should be encrypted on the new call leg.
 */
enum MediaEncryption: string
{
    case DISABLED = 'disabled';

    case SRTP = 'SRTP';

    case DTLS = 'DTLS';
}
