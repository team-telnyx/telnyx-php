<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter;

/**
 * Filter results by portability status.
 */
enum PortabilityStatus: string
{
    case PENDING = 'pending';

    case CONFIRMED = 'confirmed';

    case PROVISIONAL = 'provisional';
}
