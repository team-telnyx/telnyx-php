<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Messaging\MessagingListParams;

/**
 * Filter by phone number type.
 */
enum FilterType: string
{
    case TOLLFREE = 'tollfree';

    case LONGCODE = 'longcode';

    case SHORTCODE = 'shortcode';
}
