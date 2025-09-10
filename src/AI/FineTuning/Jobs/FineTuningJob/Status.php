<?php

declare(strict_types=1);

namespace Telnyx\AI\FineTuning\Jobs\FineTuningJob;

/**
 * The current status of the fine-tuning job.
 */
enum Status: string
{
    case QUEUED = 'queued';

    case RUNNING = 'running';

    case SUCCEEDED = 'succeeded';

    case FAILED = 'failed';

    case CANCELLED = 'cancelled';
}
