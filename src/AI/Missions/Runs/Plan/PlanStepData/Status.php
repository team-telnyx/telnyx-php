<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\Plan\PlanStepData;

enum Status: string
{
    case PENDING = 'pending';

    case IN_PROGRESS = 'in_progress';

    case COMPLETED = 'completed';

    case SKIPPED = 'skipped';

    case FAILED = 'failed';
}
