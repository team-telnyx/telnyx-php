<?php

declare(strict_types=1);

namespace Telnyx\AdvancedOrders\AdvancedOrderUpdateParams;

enum PhoneNumberType: string
{
    case LOCAL = 'local';

    case MOBILE = 'mobile';

    case TOLL_FREE = 'toll_free';

    case SHARED_COST = 'shared_cost';

    case NATIONAL = 'national';

    case LANDLINE = 'landline';
}
