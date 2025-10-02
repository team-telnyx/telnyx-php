<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingListResponse\Data\Filter;

/**
 * Logical operator for combining filters.
 */
enum FilterType: string
{
    case AND = 'and';

    case OR = 'or';
}
