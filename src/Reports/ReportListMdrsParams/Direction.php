<?php

declare(strict_types=1);

namespace Telnyx\Reports\ReportListMdrsParams;

/**
 * Filter results by direction.
 */
enum Direction: string
{
    case INBOUND = 'INBOUND';

    case OUTBOUND = 'OUTBOUND';
}
