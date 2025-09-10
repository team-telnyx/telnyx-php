<?php

declare(strict_types=1);

namespace Telnyx\Porting\Reports\PortingReport;

/**
 * The current status of the report generation.
 */
enum Status: string
{
    case PENDING = 'pending';

    case COMPLETED = 'completed';
}
