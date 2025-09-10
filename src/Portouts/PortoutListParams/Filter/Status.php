<?php

declare(strict_types=1);

namespace Telnyx\Portouts\PortoutListParams\Filter;

/**
 * Filter by portout status.
 */
enum Status: string
{
    case PENDING = 'pending';

    case AUTHORIZED = 'authorized';

    case PORTED = 'ported';

    case REJECTED = 'rejected';

    case REJECTED_PENDING = 'rejected-pending';

    case CANCELED = 'canceled';
}
