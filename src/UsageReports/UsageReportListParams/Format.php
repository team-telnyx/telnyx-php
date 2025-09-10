<?php

declare(strict_types=1);

namespace Telnyx\UsageReports\UsageReportListParams;

/**
 * Specify the response format (csv or json). JSON is returned by default, even if not specified.
 */
enum Format: string
{
    case CSV = 'csv';

    case JSON = 'json';
}
