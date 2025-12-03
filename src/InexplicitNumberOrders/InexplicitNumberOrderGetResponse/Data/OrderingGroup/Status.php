<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders\InexplicitNumberOrderGetResponse\Data\OrderingGroup;

/**
 * Status of the ordering group.
 */
enum Status: string
{
    case PENDING = 'pending';

    case PROCESSING = 'processing';

    case FAILED = 'failed';

    case SUCCESS = 'success';

    case PARTIAL_SUCCESS = 'partial_success';
}
