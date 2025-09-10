<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberListParams\Filter;

/**
 * Filter phone numbers by their source. Use 'ported' for numbers ported from other carriers, or 'purchased' for numbers bought directly from Telnyx.
 */
enum Source: string
{
    case PORTED = 'ported';

    case PURCHASED = 'purchased';
}
