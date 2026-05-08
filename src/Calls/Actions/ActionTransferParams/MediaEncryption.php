<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionTransferParams;

/**
 * Defines whether media should be encrypted on the new call leg. For SIP URI destinations, media encryption can also be requested per endpoint with the `secure` URI parameter: `;secure=true` or `;secure=srtp` enables SRTP, and `;secure=dtls` enables DTLS. This parameter, when set to `SRTP` or `DTLS`, takes precedence over the per-endpoint `secure` value.
 */
enum MediaEncryption: string
{
    case DISABLED = 'disabled';

    case SRTP = 'SRTP';

    case DTLS = 'DTLS';
}
