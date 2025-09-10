<?php

declare(strict_types=1);

namespace Telnyx\Porting\Reports\ReportListParams\Filter;

/**
 * Filter reports of a specific type.
 */
enum ReportType: string
{
    case EXPORT_PORTING_ORDERS_CSV = 'export_porting_orders_csv';
}
