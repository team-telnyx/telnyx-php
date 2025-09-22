<?php

declare(strict_types=1);

namespace Telnyx\Client\Legacy\Reporting\BatchDetailRecords\Voice\VoiceDeleteResponse\Data\Filter;

/**
 * Logical operator for combining filters.
 */
enum FilterType: string
{
    case AND = 'and';

    case OR = 'or';
}
