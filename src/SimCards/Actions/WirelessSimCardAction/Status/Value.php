<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions\WirelessSimCardAction\Status;

/**
 * The current status of the SIM card action.
 */
enum Value: string
{
    case IN_PROGRESS = 'in-progress';

    case COMPLETED = 'completed';

    case FAILED = 'failed';

    case INTERRUPTED = 'interrupted';
}
