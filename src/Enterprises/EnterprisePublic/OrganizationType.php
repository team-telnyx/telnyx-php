<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\EnterprisePublic;

/**
 * Type of organization.
 */
enum OrganizationType: string
{
    case COMMERCIAL = 'commercial';

    case GOVERNMENT = 'government';

    case NON_PROFIT = 'non_profit';
}
