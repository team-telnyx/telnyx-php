<?php

declare(strict_types=1);

namespace Telnyx\Requirements\RequirementListParams\Filter;

/**
 * Filters results to those applying to a specific phone_number_type.
 */
enum PhoneNumberType: string
{
    case LOCAL = 'local';

    case NATIONAL = 'national';

    case TOLL_FREE = 'toll_free';
}
