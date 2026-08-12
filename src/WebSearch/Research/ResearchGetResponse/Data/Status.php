<?php

declare(strict_types=1);

namespace Telnyx\WebSearch\Research\ResearchGetResponse\Data;

/**
 * Current status of the research task.
 */
enum Status: string
{
    case PENDING = 'pending';

    case RUNNING = 'running';

    case COMPLETED = 'completed';

    case FAILED = 'failed';
}
