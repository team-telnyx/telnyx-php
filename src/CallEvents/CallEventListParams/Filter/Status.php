<?php

declare(strict_types=1);

namespace Telnyx\CallEvents\CallEventListParams\Filter;

/**
 * If present, conferences will be filtered by status.
 */
enum Status: string
{
    case INIT = 'init';

    case IN_PROGRESS = 'in_progress';

    case COMPLETED = 'completed';
}
