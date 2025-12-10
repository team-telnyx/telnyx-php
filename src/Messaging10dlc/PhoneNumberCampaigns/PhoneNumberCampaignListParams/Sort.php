<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaignListParams;

/**
 * Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
 */
enum Sort: string
{
    case ASSIGNMENT_STATUS = 'assignmentStatus';

    case ASSIGNMENT_STATUS_DESC = '-assignmentStatus';

    case CREATED_AT = 'createdAt';

    case CREATED_AT_DESC = '-createdAt';

    case PHONE_NUMBER = 'phoneNumber';

    case PHONE_NUMBER_DESC = '-phoneNumber';
}
