<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressCreateParams;

enum CountryCode: string
{
    case US = 'US';

    case CA = 'CA';

    case PR = 'PR';
}
