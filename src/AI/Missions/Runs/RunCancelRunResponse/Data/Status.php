<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\RunCancelRunResponse\Data;

enum Status: string
{
    case PENDING = 'pending';

    case RUNNING = 'running';

    case PAUSED = 'paused';

    case SUCCEEDED = 'succeeded';

    case FAILED = 'failed';

    case CANCELLED = 'cancelled';
}
