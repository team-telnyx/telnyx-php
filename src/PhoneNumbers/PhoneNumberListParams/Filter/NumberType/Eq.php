<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\NumberType;

/**
 * Filter phone numbers by phone number type.
 */
enum Eq: string
{
    case LOCAL = 'local';

    case NATIONAL = 'national';

    case TOLL_FREE = 'toll_free';

    case MOBILE = 'mobile';

    case SHARED_COST = 'shared_cost';
}
