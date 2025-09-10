<?php

declare(strict_types=1);

namespace Telnyx\RequirementGroups\RequirementGroupListParams\Filter;

/**
 * Filter requirement groups by phone number type.
 */
enum PhoneNumberType: string
{
    case LOCAL = 'local';

    case TOLL_FREE = 'toll_free';

    case MOBILE = 'mobile';

    case NATIONAL = 'national';

    case SHARED_COST = 'shared_cost';
}
