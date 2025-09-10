<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrdersActivationJob;

/**
 * Specifies the type of this activation job.
 */
enum ActivationType: string
{
    case SCHEDULED = 'scheduled';

    case ON_DEMAND = 'on-demand';
}
