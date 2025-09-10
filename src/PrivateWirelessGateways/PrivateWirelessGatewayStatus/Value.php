<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayStatus;

/**
 * The current status or failure details of the Private Wireless Gateway. <ul>
 *  <li><code>provisioning</code> - the Private Wireless Gateway is being provisioned.</li>
 *  <li><code>provisioned</code> - the Private Wireless Gateway was provisioned and able to receive connections.</li>
 *  <li><code>failed</code> - the provisioning had failed for a reason and it requires an intervention.</li>
 *  <li><code>decommissioning</code> - the Private Wireless Gateway is being removed from the network.</li>
 *  </ul>
 *  Transitioning between the provisioning and provisioned states may take some time.
 */
enum Value: string
{
    case PROVISIONING = 'provisioning';

    case PROVISIONED = 'provisioned';

    case FAILED = 'failed';

    case DECOMMISSIONING = 'decommissioning';
}
