<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrder;

/**
 * The type of the phone number.
 */
enum PhoneNumberType: string
{
    case LANDLINE = 'landline';

    case LOCAL = 'local';

    case MOBILE = 'mobile';

    case NATIONAL = 'national';

    case SHARED_COST = 'shared_cost';

    case TOLL_FREE = 'toll_free';
}
