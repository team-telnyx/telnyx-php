<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

/**
 * Enable use of SRTP for encryption. Can only be set when the SIP signaling transport protocol is TLS.
 */
enum EncryptedMedia: string
{
    case SRTP = 'SRTP';
}
