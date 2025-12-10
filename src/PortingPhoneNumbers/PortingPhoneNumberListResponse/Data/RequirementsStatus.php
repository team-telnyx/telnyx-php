<?php

declare(strict_types=1);

namespace Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse\Data;

/**
 * The current status of the requirements in a INTL porting order.
 */
enum RequirementsStatus: string
{
    case REQUIREMENT_INFO_PENDING = 'requirement-info-pending';

    case REQUIREMENT_INFO_UNDER_REVIEW = 'requirement-info-under-review';

    case REQUIREMENT_INFO_EXCEPTION = 'requirement-info-exception';

    case APPROVED = 'approved';
}
