<?php

declare(strict_types=1);

namespace Telnyx\Porting\Reports\ReportListParams\Filter;

/**
 * Filter reports of a specific status.
 */
enum Status: string
{
    case PENDING = 'pending';

    case COMPLETED = 'completed';
}
