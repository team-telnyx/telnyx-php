<?php

declare(strict_types=1);

namespace Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter;

/**
 * Filter by phone number type.
 */
enum PhoneNumberType: string
{
    case LOCAL = 'local';

    case TOLL_FREE = 'toll_free';

    case NATIONAL = 'national';

    case MOBILE = 'mobile';

    case LANDLINE = 'landline';

    case SHARED_COST = 'shared_cost';
}
