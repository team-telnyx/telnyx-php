<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberAssignmentByProfile;

enum TaskStatus: string
{
    case PENDING = 'pending';

    case STARTING = 'starting';

    case RUNNING = 'running';

    case COMPLETED = 'completed';

    case FAILED = 'failed';
}
