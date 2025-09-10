<?php

declare(strict_types=1);

namespace Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter;

/**
 * Filter to group results.
 */
enum GroupBy: string
{
    case LOCALITY = 'locality';

    case NPA = 'npa';

    case NATIONAL_DESTINATION_CODE = 'national_destination_code';
}
