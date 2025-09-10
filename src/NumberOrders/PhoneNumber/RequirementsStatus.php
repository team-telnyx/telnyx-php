<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders\PhoneNumber;

/**
 * Status of document requirements (if applicable).
 */
enum RequirementsStatus: string
{
    case PENDING = 'pending';

    case APPROVED = 'approved';

    case CANCELLED = 'cancelled';

    case DELETED = 'deleted';

    case REQUIREMENT_INFO_EXCEPTION = 'requirement-info-exception';

    case REQUIREMENT_INFO_PENDING = 'requirement-info-pending';

    case REQUIREMENT_INFO_UNDER_REVIEW = 'requirement-info-under-review';
}
