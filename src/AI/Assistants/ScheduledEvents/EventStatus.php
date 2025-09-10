<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

enum EventStatus: string
{
    case PENDING = 'pending';

    case IN_PROGRESS = 'in_progress';

    case COMPLETED = 'completed';

    case FAILED = 'failed';
}
