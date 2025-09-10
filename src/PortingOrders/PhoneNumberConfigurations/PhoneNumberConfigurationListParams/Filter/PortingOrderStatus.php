<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter;

enum PortingOrderStatus: string
{
    case ACTIVATION_IN_PROGRESS = 'activation-in-progress';

    case CANCEL_PENDING = 'cancel-pending';

    case CANCELLED = 'cancelled';

    case DRAFT = 'draft';

    case EXCEPTION = 'exception';

    case FOC_DATE_CONFIRMED = 'foc-date-confirmed';

    case IN_PROCESS = 'in-process';

    case PORTED = 'ported';

    case SUBMITTED = 'submitted';
}
