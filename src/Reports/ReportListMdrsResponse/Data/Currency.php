<?php

declare(strict_types=1);

namespace Telnyx\Reports\ReportListMdrsResponse\Data;

/**
 * Currency of the rate and cost.
 */
enum Currency: string
{
    case AUD = 'AUD';

    case CAD = 'CAD';

    case EUR = 'EUR';

    case GBP = 'GBP';

    case USD = 'USD';
}
