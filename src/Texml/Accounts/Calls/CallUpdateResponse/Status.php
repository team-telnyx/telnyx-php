<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallUpdateResponse;

/**
 * The status of this call.
 */
enum Status: string
{
    case RINGING = 'ringing';

    case IN_PROGRESS = 'in-progress';

    case CANCELED = 'canceled';

    case COMPLETED = 'completed';

    case FAILED = 'failed';

    case BUSY = 'busy';

    case NO_ANSWER = 'no-answer';
}
