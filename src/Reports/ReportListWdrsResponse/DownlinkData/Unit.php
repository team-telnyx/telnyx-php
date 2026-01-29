<?php

declare(strict_types=1);

namespace Telnyx\Reports\ReportListWdrsResponse\DownlinkData;

/**
 * Transmission unit.
 */
enum Unit: string
{
    case B = 'B';

    case KB = 'KB';

    case MB = 'MB';
}
