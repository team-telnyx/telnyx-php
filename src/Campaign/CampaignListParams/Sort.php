<?php

declare(strict_types=1);

namespace Telnyx\Campaign\CampaignListParams;

/**
  * Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
  * 
 */
enum Sort : string
{

    case ASSIGNED_PHONE_NUMBERS_COUNT = "assignedPhoneNumbersCount";

    case SORT_-ASSIGNED_PHONE_NUMBERS_COUNT = "-assignedPhoneNumbersCount";

    case CAMPAIGN_ID = "campaignId";

    case SORT_-CAMPAIGN_ID = "-campaignId";

    case CREATED_AT = "createdAt";

    case SORT_-CREATED_AT = "-createdAt";

    case STATUS = "status";

    case SORT_-STATUS = "-status";

    case TCR_CAMPAIGN_ID = "tcrCampaignId";

    case SORT_-TCR_CAMPAIGN_ID = "-tcrCampaignId";

}