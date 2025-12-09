<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberSlimListResponse;

/**
 * The phone number's current status.
 */
enum Status: string
{
    case PURCHASE_PENDING = 'purchase-pending';

    case PURCHASE_FAILED = 'purchase-failed';

    case PORT_PENDING = 'port-pending';

    case PORT_FAILED = 'port-failed';

    case ACTIVE = 'active';

    case DELETED = 'deleted';

    case EMERGENCY_ONLY = 'emergency-only';

    case PORTED_OUT = 'ported-out';

    case PORT_OUT_PENDING = 'port-out-pending';

    case REQUIREMENT_INFO_PENDING = 'requirement-info-pending';

    case REQUIREMENT_INFO_UNDER_REVIEW = 'requirement-info-under-review';

    case REQUIREMENT_INFO_EXCEPTION = 'requirement-info-exception';

    case PROVISION_PENDING = 'provision-pending';
}
