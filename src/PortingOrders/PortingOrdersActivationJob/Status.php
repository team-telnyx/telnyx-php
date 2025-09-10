<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrdersActivationJob;

/**
 * Specifies the status of this activation job.
 */
enum Status: string
{
    case CREATED = 'created';

    case IN_PROCESS = 'in-process';

    case COMPLETED = 'completed';

    case FAILED = 'failed';
}
