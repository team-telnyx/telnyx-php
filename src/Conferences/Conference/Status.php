<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Conference;

/**
 * Status of the conference.
 */
enum Status: string
{
    case INIT = 'init';

    case IN_PROGRESS = 'in_progress';

    case COMPLETED = 'completed';
}
