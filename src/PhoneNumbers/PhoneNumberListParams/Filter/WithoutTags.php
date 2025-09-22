<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberListParams\Filter;

/**
 * When set to 'true', filters for phone numbers that do not have any tags applied. All other values are ignored.
 */
enum WithoutTags: string
{
    case TRUE = 'true';

    case FALSE = 'false';
}
