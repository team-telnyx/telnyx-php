<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

/**
 * Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
 */
enum EncryptedMedia: string
{
    case SRTP = 'SRTP';
}
