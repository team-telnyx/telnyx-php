<?php

declare(strict_types=1);

namespace Telnyx\FqdnConnections\OutboundFqdn;

enum IPAuthenticationMethod: string
{
    case CREDENTIAL_AUTHENTICATION = 'credential-authentication';

    case IP_AUTHENTICATION = 'ip-authentication';
}
