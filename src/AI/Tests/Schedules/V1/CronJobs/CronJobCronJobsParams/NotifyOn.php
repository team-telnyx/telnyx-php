<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\Schedules\V1\CronJobs\CronJobCronJobsParams;

enum NotifyOn: string
{
    case NEVER = 'never';

    case SUCCESS = 'success';

    case FAILURE = 'failure';

    case BOTH = 'both';
}
