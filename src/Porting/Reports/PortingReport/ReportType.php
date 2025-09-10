<?php

declare(strict_types=1);

namespace Telnyx\Porting\Reports\PortingReport;

/**
 * Identifies the type of report.
 */
enum ReportType: string
{
    case EXPORT_PORTING_ORDERS_CSV = 'export_porting_orders_csv';
}
