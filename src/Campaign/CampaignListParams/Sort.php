<?php

declare(strict_types=1);

namespace Telnyx\Campaign\CampaignListParams;

/**
 * Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
 */
enum Sort: string
{
    case ASSIGNED_PHONE_NUMBERS_COUNT = 'assignedPhoneNumbersCount';

    case ASSIGNED_PHONE_NUMBERS_COUNT_DESC = '-assignedPhoneNumbersCount';

    case CAMPAIGN_ID = 'campaignId';

    case CAMPAIGN_ID_DESC = '-campaignId';

    case CREATED_AT = 'createdAt';

    case CREATED_AT_DESC = '-createdAt';

    case STATUS = 'status';

    case STATUS_DESC = '-status';

    case TCR_CAMPAIGN_ID = 'tcrCampaignId';

    case TCR_CAMPAIGN_ID_DESC = '-tcrCampaignId';
}
