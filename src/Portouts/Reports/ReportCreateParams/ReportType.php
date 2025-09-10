<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports\ReportCreateParams;

/**
 * Identifies the type of report.
 */
enum ReportType: string
{
    case EXPORT_PORTOUTS_CSV = 'export_portouts_csv';
}
