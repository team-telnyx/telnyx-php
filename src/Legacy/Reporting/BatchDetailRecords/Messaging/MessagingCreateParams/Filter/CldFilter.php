<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingCreateParams\Filter;

/**
 * Filter type for CLD matching.
 */
enum CldFilter: string
{
    case CONTAINS = 'contains';

    case STARTS_WITH = 'starts_with';

    case ENDS_WITH = 'ends_with';
}
