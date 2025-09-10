<?php

declare(strict_types=1);

namespace Telnyx\Brand\BrandListParams;

/**
  * Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
  * 
 */
enum Sort : string
{

    case ASSIGNED_CAMPAIGNS_COUNT = "assignedCampaignsCount";

    case SORT_-ASSIGNED_CAMPAIGNS_COUNT = "-assignedCampaignsCount";

    case BRAND_ID = "brandId";

    case SORT_-BRAND_ID = "-brandId";

    case CREATED_AT = "createdAt";

    case SORT_-CREATED_AT = "-createdAt";

    case DISPLAY_NAME = "displayName";

    case SORT_-DISPLAY_NAME = "-displayName";

    case IDENTITY_STATUS = "identityStatus";

    case SORT_-IDENTITY_STATUS = "-identityStatus";

    case STATUS = "status";

    case SORT_-STATUS = "-status";

    case TCR_BRAND_ID = "tcrBrandId";

    case SORT_-TCR_BRAND_ID = "-tcrBrandId";

}