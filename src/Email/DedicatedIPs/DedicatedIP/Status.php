<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs\DedicatedIP;

/**
 * Lifecycle status. `provisioning`: purchased and billed, carries no mail until `start_warmup`. `warming_up`: warm-up ramp in progress. `active`: ramp complete. `suspended`: suspended by Telnyx; carries no mail and is still billed. `released`: returned to Telnyx; carries no mail.
 */
enum Status: string
{
    case PROVISIONING = 'provisioning';

    case WARMING_UP = 'warming_up';

    case ACTIVE = 'active';

    case SUSPENDED = 'suspended';

    case RELEASED = 'released';
}
