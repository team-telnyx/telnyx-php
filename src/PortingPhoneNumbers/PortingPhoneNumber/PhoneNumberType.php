<?php

declare(strict_types=1);

namespace Telnyx\PortingPhoneNumbers\PortingPhoneNumber;

/**
 * The type of the phone number.
 */
enum PhoneNumberType: string
{
    case LANDLINE = 'landline';

    case LOCAL = 'local';

    case MOBILE = 'mobile';

    case MULTIPURPOSE = 'multipurpose';

    case NATIONAL = 'national';

    case OTHER = 'other';

    case SHARED_COST = 'shared_cost';

    case TOLL_FREE = 'toll_free';
}
