<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\ConferenceRetrieveConferencesParams;

/**
 * Filters conferences by status.
 */
enum Status: string
{
    case INIT = 'init';

    case IN_PROGRESS = 'in-progress';

    case COMPLETED = 'completed';
}
