<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\EnterpriseReputationPublic;

/**
 * How often Telnyx refreshes the stored reputation data for this enterprise's registered numbers.
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
