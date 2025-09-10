<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports\ReportListParams\Filter;

/**
 * Filter reports of a specific type.
 */
enum ReportType: string
{
    case EXPORT_PORTOUTS_CSV = 'export_portouts_csv';
}
