<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallCallsParams\Params\ApplicationDefault;

/**
 * Defines whether media should be encrypted on the call. When set to `SRTP`, the call will use Secure Real-time Transport Protocol for media encryption. When set to `DTLS`, the call will use DTLS for media encryption. Only supported for SIP destinations.
 */
enum MediaEncryption: string
{
    case DISABLED = 'disabled';

    case SRTP = 'SRTP';

    case DTLS = 'DTLS';
}
