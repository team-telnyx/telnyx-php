<?php

declare(strict_types=1);

namespace Telnyx\PartnerCampaigns\PartnerCampaignListParams;

/**
  * Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
  * 
 */
enum Sort : string
{

    case ASSIGNED_PHONE_NUMBERS_COUNT = "assignedPhoneNumbersCount";

    case SORT_-ASSIGNED_PHONE_NUMBERS_COUNT = "-assignedPhoneNumbersCount";

    case BRAND_DISPLAY_NAME = "brandDisplayName";

    case SORT_-BRAND_DISPLAY_NAME = "-brandDisplayName";

    case TCR_BRAND_ID = "tcrBrandId";

    case SORT_-TCR_BRAN_ID = "-tcrBranId";

    case TCR_CAMPAIGN_ID = "tcrCampaignId";

    case SORT_-TCR_CAMPAIGN_ID = "-tcrCampaignId";

    case CREATED_AT = "createdAt";

    case SORT_-CREATED_AT = "-createdAt";

    case CAMPAIGN_STATUS = "campaignStatus";

    case SORT_-CAMPAIGN_STATUS = "-campaignStatus";

}