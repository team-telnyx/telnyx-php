<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListParams;

/**
  * Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
  * 
 */
enum Sort : string
{

    case ASSIGNMENT_STATUS = "assignmentStatus";

    case SORT_-ASSIGNMENT_STATUS = "-assignmentStatus";

    case CREATED_AT = "createdAt";

    case SORT_-CREATED_AT = "-createdAt";

    case PHONE_NUMBER = "phoneNumber";

    case SORT_-PHONE_NUMBER = "-phoneNumber";

}