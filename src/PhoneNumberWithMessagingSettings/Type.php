<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberWithMessagingSettings;

/**
 * The type of the phone number.
 */
enum Type: string
{
    case LONG_CODE = 'long-code';

    case TOLL_FREE = 'toll-free';

    case SHORT_CODE = 'short-code';

    case LONGCODE = 'longcode';

    case TOLLFREE = 'tollfree';

    case SHORTCODE = 'shortcode';
}
