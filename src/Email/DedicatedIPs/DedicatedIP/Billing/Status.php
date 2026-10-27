<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs\DedicatedIP\Billing;

/**
 * `not_started`: no charge recorded for the current allocation. `pending`: the charge is queued. `in_progress`: the charge is being created. `active`: the MRC is active. `stopping`: release requested; the MRC stop is being processed. `stopped`: the MRC has stopped. `stop_failed`: the MRC stop failed and the charge remains. `failed`: the charge could not be created.
 */
enum Status: string
{
    case NOT_STARTED = 'not_started';

    case PENDING = 'pending';

    case IN_PROGRESS = 'in_progress';

    case ACTIVE = 'active';

    case STOPPING = 'stopping';

    case STOPPED = 'stopped';

    case STOP_FAILED = 'stop_failed';

    case FAILED = 'failed';
}
