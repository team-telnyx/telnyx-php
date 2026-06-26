<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\Events\EventLogParams;

enum Type: string
{
    case STATUS_CHANGE = 'status_change';

    case STEP_STARTED = 'step_started';

    case STEP_COMPLETED = 'step_completed';

    case STEP_FAILED = 'step_failed';

    case TOOL_CALL = 'tool_call';

    case TOOL_RESULT = 'tool_result';

    case MESSAGE = 'message';

    case ERROR = 'error';

    case CUSTOM = 'custom';
}
