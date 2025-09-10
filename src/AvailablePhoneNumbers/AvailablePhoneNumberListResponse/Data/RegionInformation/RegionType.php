<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\RegionInformation;

enum RegionType: string
{
    case COUNTRY_CODE = 'country_code';

    case RATE_CENTER = 'rate_center';

    case STATE = 'state';

    case LOCATION = 'location';
}
