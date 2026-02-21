<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\PartnerCampaigns\PartnerCampaignListParams;

/**
 * Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
 */
enum Sort: string
{
    case ASSIGNED_PHONE_NUMBERS_COUNT = 'assignedPhoneNumbersCount';

    case ASSIGNED_PHONE_NUMBERS_COUNT_DESC = '-assignedPhoneNumbersCount';

    case BRAND_DISPLAY_NAME = 'brandDisplayName';

    case BRAND_DISPLAY_NAME_DESC = '-brandDisplayName';

    case TCR_BRAND_ID = 'tcrBrandId';

    case TCR_BRAND_ID_DESC = '-tcrBrandId';

    case TCR_CAMPAIGN_ID = 'tcrCampaignId';

    case TCR_CAMPAIGN_ID_DESC = '-tcrCampaignId';

    case CREATED_AT = 'createdAt';

    case CREATED_AT_DESC = '-createdAt';

    case CAMPAIGN_STATUS = 'campaignStatus';

    case CAMPAIGN_STATUS_DESC = '-campaignStatus';
}
