<?php

declare(strict_types=1);

namespace Telnyx\Networks;

/**
 * The current status of the interface deployment.
 */
enum InterfaceStatus: string
{
    case CREATED = 'created';

    case PROVISIONING = 'provisioning';

    case PROVISIONED = 'provisioned';

    case DELETING = 'deleting';
}
