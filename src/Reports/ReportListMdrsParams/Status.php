<?php

declare(strict_types=1);

namespace Telnyx\Reports\ReportListMdrsParams;

/**
 * Filter results by status.
 */
enum Status: string
{
    case GW_TIMEOUT = 'GW_TIMEOUT';

    case DELIVERED = 'DELIVERED';

    case DLR_UNCONFIRMED = 'DLR_UNCONFIRMED';

    case DLR_TIMEOUT = 'DLR_TIMEOUT';

    case RECEIVED = 'RECEIVED';

    case GW_REJECT = 'GW_REJECT';

    case FAILED = 'FAILED';
}
