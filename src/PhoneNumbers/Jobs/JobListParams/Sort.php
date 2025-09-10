<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs\JobListParams;

/**
 * Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
 */
enum Sort: string
{
    case CREATED_AT = 'created_at';
}
