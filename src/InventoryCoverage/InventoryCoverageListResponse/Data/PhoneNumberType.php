<?php

declare(strict_types=1);

namespace Telnyx\InventoryCoverage\InventoryCoverageListResponse\Data;

enum PhoneNumberType: string
{
    case LOCAL = 'local';

    case TOLL_FREE = 'toll_free';

    case NATIONAL = 'national';

    case LANDLINE = 'landline';

    case SHARED_COST = 'shared_cost';

    case MOBILE = 'mobile';
}
