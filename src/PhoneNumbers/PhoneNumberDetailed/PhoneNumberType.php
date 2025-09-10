<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberDetailed;

/**
 * The phone number's type.
 * Note: For numbers purchased prior to July 2023 or when fetching a number's details immediately after a purchase completes, the legacy values `tollfree`, `shortcode` or `longcode` may be returned instead.
 */
enum PhoneNumberType: string
{
    case LOCAL = 'local';

    case TOLL_FREE = 'toll_free';

    case MOBILE = 'mobile';

    case NATIONAL = 'national';

    case SHARED_COST = 'shared_cost';

    case LANDLINE = 'landline';

    case TOLLFREE = 'tollfree';

    case SHORTCODE = 'shortcode';

    case LONGCODE = 'longcode';
}
