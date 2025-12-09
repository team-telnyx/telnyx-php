<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\PartnerCampaigns\PartnerCampaignListParams\Sort;
use Telnyx\Number10dlc\PartnerCampaigns\PartnerCampaignListResponse;
use Telnyx\PartnerCampaigns\TelnyxDownstreamCampaign;
use Telnyx\RequestOptions;

interface PartnerCampaignsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): TelnyxDownstreamCampaign;

    /**
     * @api
     *
     * @param string $webhookFailoverURL webhook failover to which campaign status updates are sent
     * @param string $webhookURL webhook to which campaign status updates are sent
     *
     * @throws APIException
     */
    public function update(
        string $campaignID,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?RequestOptions $requestOptions = null,
    ): TelnyxDownstreamCampaign;

    /**
     * @api
     *
     * @param int $page The 1-indexed page number to get. The default value is `1`.
     * @param int $recordsPerPage The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
     * @param 'assignedPhoneNumbersCount'|'-assignedPhoneNumbersCount'|'brandDisplayName'|'-brandDisplayName'|'tcrBrandId'|'-tcrBranId'|'tcrCampaignId'|'-tcrCampaignId'|'createdAt'|'-createdAt'|'campaignStatus'|'-campaignStatus'|Sort $sort Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     *
     * @throws APIException
     */
    public function list(
        int $page = 1,
        int $recordsPerPage = 10,
        string|Sort $sort = '-createdAt',
        ?RequestOptions $requestOptions = null,
    ): PartnerCampaignListResponse;
}
