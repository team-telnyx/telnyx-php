<?php

declare(strict_types=1);

namespace Telnyx\OtaUpdates\OtaUpdateListParams\Filter;

/**
 * Filter by a specific status of the resource's lifecycle.
 */
enum Status: string
{
    case IN_PROGRESS = 'in-progress';

    case COMPLETED = 'completed';

    case FAILED = 'failed';
}
