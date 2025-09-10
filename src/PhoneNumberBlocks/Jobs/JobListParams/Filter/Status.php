<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Filter;

/**
 * Identifies the status of the background job.
 */
enum Status: string
{
    case PENDING = 'pending';

    case IN_PROGRESS = 'in_progress';

    case COMPLETED = 'completed';

    case FAILED = 'failed';
}
