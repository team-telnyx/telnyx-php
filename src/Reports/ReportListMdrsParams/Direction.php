<?php

declare(strict_types=1);

namespace Telnyx\Reports\ReportListMdrsParams;

/**
 * Direction (inbound or outbound).
 */
enum Direction: string
{
    case INBOUND = 'INBOUND';

    case OUTBOUND = 'OUTBOUND';
}
