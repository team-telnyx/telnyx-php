<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\Status;

enum UnionArrayVariant1: string
{
    case DRAFT = 'draft';

    case IN_PROCESS = 'in-process';

    case SUBMITTED = 'submitted';

    case EXCEPTION = 'exception';

    case FOC_DATE_CONFIRMED = 'foc-date-confirmed';

    case CANCEL_PENDING = 'cancel-pending';

    case PORTED = 'ported';

    case CANCELLED = 'cancelled';
}
