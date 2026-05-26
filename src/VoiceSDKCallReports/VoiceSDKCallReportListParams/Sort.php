<?php

declare(strict_types=1);

namespace Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListParams;

/**
 * Set the order of the results by creation date. `asc` and `created_at` sort oldest reports first; `desc` and `-created_at` sort newest reports first. If not given, results are sorted by creation date in descending order.
 */
enum Sort: string
{
    case ASC = 'asc';

    case DESC = 'desc';

    case CREATED_AT = 'created_at';

    case CREATED_AT_DESC = '-created_at';
}
