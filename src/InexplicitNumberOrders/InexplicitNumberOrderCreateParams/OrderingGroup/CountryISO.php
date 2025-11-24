<?php

declare(strict_types=1);

namespace Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams\OrderingGroup;

/**
 * Country where you would like to purchase phone numbers. Allowable values: US, CA.
 */
enum CountryISO: string
{
    case US = 'US';

    case CA = 'CA';
}
