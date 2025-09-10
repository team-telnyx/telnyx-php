<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Reports\PortoutReport;

/**
 * The current status of the report generation.
 */
enum Status: string
{
    case PENDING = 'pending';

    case COMPLETED = 'completed';
}
