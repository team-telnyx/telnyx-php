<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\ReputationCreateParams;

/**
 * Frequency for automatically refreshing reputation data.
 */
enum CheckFrequency: string
{
    case BUSINESS_DAILY = 'business_daily';

    case DAILY = 'daily';

    case WEEKLY = 'weekly';

    case BIWEEKLY = 'biweekly';

    case MONTHLY = 'monthly';

    case NEVER = 'never';
}
