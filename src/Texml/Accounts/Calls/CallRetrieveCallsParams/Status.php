<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallRetrieveCallsParams;

/**
 * Filters calls by status.
 */
enum Status: string
{
    case CANCELED = 'canceled';

    case COMPLETED = 'completed';

    case FAILED = 'failed';

    case BUSY = 'busy';

    case NO_ANSWER = 'no-answer';
}
