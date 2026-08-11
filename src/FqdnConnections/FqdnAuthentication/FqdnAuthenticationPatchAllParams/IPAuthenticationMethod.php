<?php

declare(strict_types=1);

namespace Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationPatchAllParams;

/**
 * The IP authentication method.
 */
enum IPAuthenticationMethod: string
{
    case TOKEN = 'token';

    case P_CHARGE_INFO = 'p-charge-info';
}
