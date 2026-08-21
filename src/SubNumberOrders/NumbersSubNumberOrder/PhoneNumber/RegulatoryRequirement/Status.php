<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders\NumbersSubNumberOrder\PhoneNumber\RegulatoryRequirement;

/**
 * The status of the regulatory requirement for this phone number.
 */
enum Status: string
{
    case APPROVED = 'approved';

    case DECLINED = 'declined';

    case AWAITING_VALUE = 'awaiting-value';

    case PENDING_APPROVAL = 'pending-approval';
}
