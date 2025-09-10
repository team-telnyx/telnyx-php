<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports\PortoutReport;

/**
 * Identifies the type of report.
 */
enum ReportType: string
{
    case EXPORT_PORTOUTS_CSV = 'export_portouts_csv';
}
