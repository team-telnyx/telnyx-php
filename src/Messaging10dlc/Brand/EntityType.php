<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\Brand;

/**
 * Entity type behind the brand. This is the form of business establishment.
 */
enum EntityType: string
{
    case PRIVATE_PROFIT = 'PRIVATE_PROFIT';

    case PUBLIC_PROFIT = 'PUBLIC_PROFIT';

    case NON_PROFIT = 'NON_PROFIT';

    case GOVERNMENT = 'GOVERNMENT';
}
