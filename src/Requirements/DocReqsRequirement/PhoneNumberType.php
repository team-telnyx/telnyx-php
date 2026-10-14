<?php

declare(strict_types=1);

namespace Telnyx\Requirements\DocReqsRequirement;

/**
 * Indicates the phone_number_type this requirement applies to. Leave blank if this requirement applies to all number_types.
 */
enum PhoneNumberType: string
{
    case LOCAL = 'local';

    case MOBILE = 'mobile';

    case MULTIPURPOSE = 'multipurpose';

    case NATIONAL = 'national';

    case SHARED_COST = 'shared_cost';

    case TOLL_FREE = 'toll_free';
}
