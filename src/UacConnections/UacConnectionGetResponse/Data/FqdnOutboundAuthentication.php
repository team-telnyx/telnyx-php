<?php

declare(strict_types=1);

namespace Telnyx\UacConnections\UacConnectionGetResponse\Data;

/**
 * The fixed outbound authentication mode used by UAC FQDN records.
 */
enum FqdnOutboundAuthentication: string
{
    case CREDENTIAL_AUTHENTICATION = 'credential-authentication';
}
