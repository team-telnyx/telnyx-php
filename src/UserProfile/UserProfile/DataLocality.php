<?php

declare(strict_types=1);

namespace Telnyx\UserProfile\UserProfile;

/**
 * The user's data locality: USA (United States), DEU (Germany), AUS (Australia), UAE (United Arab Emirates), or CAN (Canada).
 */
enum DataLocality: string
{
    case USA = 'USA';

    case DEU = 'DEU';

    case AUS = 'AUS';

    case UAE = 'UAE';

    case CAN = 'CAN';
}
