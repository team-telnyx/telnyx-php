<?php

declare(strict_types=1);

namespace Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationPatchAllParams;

/**
 * The outbound authentication type.
 */
enum FqdnOutboundAuthentication: string
{
    case IP_AUTHENTICATION = 'ip-authentication';

    case CREDENTIAL_AUTHENTICATION = 'credential-authentication';
}
