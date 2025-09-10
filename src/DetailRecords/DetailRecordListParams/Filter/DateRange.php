<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListParams\Filter;

/**
 * Filter by the given user-friendly date range. You can specify one of the following enum values, or a dynamic one using this format: last_N_days.
 */
enum DateRange: string
{
    case YESTERDAY = 'yesterday';

    case TODAY = 'today';

    case TOMORROW = 'tomorrow';

    case LAST_WEEK = 'last_week';

    case THIS_WEEK = 'this_week';

    case NEXT_WEEK = 'next_week';

    case LAST_MONTH = 'last_month';

    case THIS_MONTH = 'this_month';

    case NEXT_MONTH = 'next_month';
}
