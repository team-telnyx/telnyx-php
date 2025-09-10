<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions\ActionBulkSetPublicIPsResponse\Data;

/**
 * The operation type. It can be one of the following: <br/>
 * <ul>
 * <li><code>bulk_set_public_ips</code> - set a public IP for each specified SIM card.</li>
 * </ul>.
 */
enum ActionType: string
{
    case BULK_SET_PUBLIC_IPS = 'bulk_set_public_ips';
}
