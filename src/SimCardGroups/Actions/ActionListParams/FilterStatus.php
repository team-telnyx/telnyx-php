<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\Actions\ActionListParams;

/**
 * Filter by a specific status of the resource's lifecycle.
 */
enum FilterStatus: string
{
    case IN_PROGRESS = 'in-progress';

    case COMPLETED = 'completed';

    case FAILED = 'failed';
}
