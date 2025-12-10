<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\PhoneNumberCampaigns\PhoneNumberCampaign;

/**
 * The assignment status of the number.
 */
enum AssignmentStatus: string
{
    case FAILED_ASSIGNMENT = 'FAILED_ASSIGNMENT';

    case PENDING_ASSIGNMENT = 'PENDING_ASSIGNMENT';

    case ASSIGNED = 'ASSIGNED';

    case PENDING_UNASSIGNMENT = 'PENDING_UNASSIGNMENT';

    case FAILED_UNASSIGNMENT = 'FAILED_UNASSIGNMENT';
}
