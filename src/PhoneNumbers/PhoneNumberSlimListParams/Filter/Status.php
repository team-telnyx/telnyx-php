<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter;

/**
 * Filter by phone number status.
 */
enum Status: string
{
    case PURCHASE_PENDING = 'purchase-pending';

    case PURCHASE_FAILED = 'purchase-failed';

    case PORT_PENDING = 'port_pending';

    case ACTIVE = 'active';

    case DELETED = 'deleted';

    case PORT_FAILED = 'port-failed';

    case EMERGENCY_ONLY = 'emergency-only';

    case PORTED_OUT = 'ported-out';

    case PORT_OUT_PENDING = 'port-out-pending';
}
