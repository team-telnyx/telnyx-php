<?php

declare(strict_types=1);

namespace Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouter;

/**
 * `provisioning`: Telnyx is creating the router or applying a change. `provisioned`: the router is on the tailnet and advertises its routes; the tailnet still approves them. `failed`: enrollment did not complete, and `PATCH` retries it. `deleting`: the router is being removed.
 */
enum Status: string
{
    case PROVISIONING = 'provisioning';

    case PROVISIONED = 'provisioned';

    case FAILED = 'failed';

    case DELETING = 'deleting';
}
