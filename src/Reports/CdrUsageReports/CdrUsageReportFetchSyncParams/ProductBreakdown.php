<?php

declare(strict_types=1);

namespace Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams;

/**
 * Filter results by product breakdown.
 */
enum ProductBreakdown: string
{
    case NO_BREAKDOWN = 'NO_BREAKDOWN';

    case DID_VS_TOLL_FREE = 'DID_VS_TOLL_FREE';

    case COUNTRY = 'COUNTRY';

    case DID_VS_TOLL_FREE_PER_COUNTRY = 'DID_VS_TOLL_FREE_PER_COUNTRY';
}
