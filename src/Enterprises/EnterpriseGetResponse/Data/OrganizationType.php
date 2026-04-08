<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\EnterpriseGetResponse\Data;

/**
 * Type of organization.
 */
enum OrganizationType: string
{
    case COMMERCIAL = 'commercial';

    case GOVERNMENT = 'government';

    case NON_PROFIT = 'non_profit';
}
