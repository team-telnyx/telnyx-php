<?php

declare(strict_types=1);

namespace Telnyx\SpendLimits;

/**
 * `daily` is the current UTC day; `monthly` is the current UTC calendar month.
 */
enum SpendLimitPeriod: string
{
    case DAILY = 'daily';

    case MONTHLY = 'monthly';
}
