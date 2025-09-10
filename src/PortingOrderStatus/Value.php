<?php

declare(strict_types=1);

namespace Telnyx\PortingOrderStatus;

/**
 * The current status of the porting order.
 */
enum Value: string
{
    case DRAFT = 'draft';

    case IN_PROCESS = 'in-process';

    case SUBMITTED = 'submitted';

    case EXCEPTION = 'exception';

    case FOC_DATE_CONFIRMED = 'foc-date-confirmed';

    case PORTED = 'ported';

    case CANCELLED = 'cancelled';

    case CANCEL_PENDING = 'cancel-pending';
}
