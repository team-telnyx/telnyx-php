<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports\ReportListParams\Filter;

/**
 * Filter reports of a specific status.
 */
enum Status: string
{
    case PENDING = 'pending';

    case COMPLETED = 'completed';
}
