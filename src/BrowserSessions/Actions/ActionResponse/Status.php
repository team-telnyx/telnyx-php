<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions\ActionResponse;

/**
 * POST returns 202 for queued or running actions. Terminal states are succeeded, failed, and unknown (the execution outcome could not be determined, with error.code=execution_lost). GET returns 200 for both nonterminal and terminal states.
 */
enum Status: string
{
    case QUEUED = 'queued';

    case RUNNING = 'running';

    case SUCCEEDED = 'succeeded';

    case FAILED = 'failed';

    case UNKNOWN = 'unknown';
}
