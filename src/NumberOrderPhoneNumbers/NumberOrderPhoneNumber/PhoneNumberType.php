<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber;

enum PhoneNumberType: string
{
    case LOCAL = 'local';

    case TOLL_FREE = 'toll_free';

    case MOBILE = 'mobile';

    case NATIONAL = 'national';

    case SHARED_COST = 'shared_cost';

    case LANDLINE = 'landline';
}
