<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallDialParams;

/**
 * Defines whether media should be encrypted on the call.
 */
enum MediaEncryption: string
{
    case DISABLED = 'disabled';

    case SRTP = 'SRTP';

    case DTLS = 'DTLS';
}
