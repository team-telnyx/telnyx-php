<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrder\PhoneNumber;

/**
 * Specifies whether Telnyx is able to confirm portability this number in the United States & Canada. International phone numbers are provisional by default.
 */
enum PortabilityStatus: string
{
    case PENDING = 'pending';

    case CONFIRMED = 'confirmed';

    case PROVISIONAL = 'provisional';
}
