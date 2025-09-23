<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingNewResponse\Data\Filter;

/**
 * Filter type for CLI matching.
 */
enum CliFilter: string
{
    case CONTAINS = 'contains';

    case STARTS_WITH = 'starts_with';

    case ENDS_WITH = 'ends_with';
}
