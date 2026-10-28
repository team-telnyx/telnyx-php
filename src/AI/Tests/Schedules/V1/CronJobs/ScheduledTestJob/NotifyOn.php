<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\Schedules\V1\CronJobs\ScheduledTestJob;

/**
 * When the job sends a notification.
 */
enum NotifyOn: string
{
    case NEVER = 'never';

    case SUCCESS = 'success';

    case FAILURE = 'failure';

    case BOTH = 'both';
}
