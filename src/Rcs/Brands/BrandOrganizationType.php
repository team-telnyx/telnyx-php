<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Brands;

enum BrandOrganizationType: string
{
    case PRIVATE_PROFIT = 'PRIVATE_PROFIT';

    case PUBLIC_PROFIT = 'PUBLIC_PROFIT';

    case NON_PROFIT = 'NON_PROFIT';

    case GOVERNMENT = 'GOVERNMENT';

    case UNKNOWN = 'UNKNOWN';
}
