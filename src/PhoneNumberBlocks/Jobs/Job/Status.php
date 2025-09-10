<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberBlocks\Jobs\Job;

/**
 * Indicates the completion status of the background operation.
 */
enum Status: string
{
    case PENDING = 'pending';

    case IN_PROGRESS = 'in_progress';

    case COMPLETED = 'completed';

    case FAILED = 'failed';
}
