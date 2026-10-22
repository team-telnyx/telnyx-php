<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupGetResponse\Data\Portability;

/**
 * The line type of the phone number. Uses the same value set as carrier.type; see the API reference for the full list.
 */
enum LineType: string
{
    case FIXED_LINE = 'fixed line';

    case MOBILE = 'mobile';

    case VOIP = 'voip';

    case FIXED_LINE_OR_MOBILE = 'fixed line or mobile';

    case TOLL_FREE = 'toll free';

    case PREMIUM_RATE = 'premium rate';

    case SHARED_COST = 'shared cost';

    case PERSONAL_NUMBER = 'personal number';

    case PAGER = 'pager';

    case UAN = 'uan';

    case VOICEMAIL = 'voicemail';

    case UNKNOWN = 'unknown';
}
