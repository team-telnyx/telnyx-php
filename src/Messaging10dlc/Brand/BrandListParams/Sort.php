<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\Brand\BrandListParams;

/**
 * Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
 */
enum Sort: string
{
    case ASSIGNED_CAMPAIGNS_COUNT = 'assignedCampaignsCount';

    case ASSIGNED_CAMPAIGNS_COUNT_DESC = '-assignedCampaignsCount';

    case BRAND_ID = 'brandId';

    case BRAND_ID_DESC = '-brandId';

    case CREATED_AT = 'createdAt';

    case CREATED_AT_DESC = '-createdAt';

    case DISPLAY_NAME = 'displayName';

    case DISPLAY_NAME_DESC = '-displayName';

    case IDENTITY_STATUS = 'identityStatus';

    case IDENTITY_STATUS_DESC = '-identityStatus';

    case STATUS = 'status';

    case STATUS_DESC = '-status';

    case TCR_BRAND_ID = 'tcrBrandId';

    case TCR_BRAND_ID_DESC = '-tcrBrandId';
}
