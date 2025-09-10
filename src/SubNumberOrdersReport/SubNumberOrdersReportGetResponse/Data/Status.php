<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrdersReport\SubNumberOrdersReportGetResponse\Data;

/**
 * Indicates the completion level of the sub number orders report. The report must have a status of 'success' before it can be downloaded.
 */
enum Status: string
{
    case PENDING = 'pending';

    case SUCCESS = 'success';

    case FAILED = 'failed';

    case EXPIRED = 'expired';
}
