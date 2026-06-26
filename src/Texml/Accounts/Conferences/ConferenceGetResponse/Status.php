<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\ConferenceGetResponse;

/**
 * The status of this conference.
 */
enum Status: string
{
    case INIT = 'init';

    case IN_PROGRESS = 'in-progress';

    case COMPLETED = 'completed';
}
