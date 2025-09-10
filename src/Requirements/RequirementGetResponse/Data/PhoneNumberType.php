<?php

declare(strict_types=1);

namespace Telnyx\Requirements\RequirementGetResponse\Data;

/**
 * Indicates the phone_number_type this requirement applies to. Leave blank if this requirement applies to all number_types.
 */
enum PhoneNumberType: string
{
    case LOCAL = 'local';

    case NATIONAL = 'national';

    case TOLL_FREE = 'toll_free';
}
