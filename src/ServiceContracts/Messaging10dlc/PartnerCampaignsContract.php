<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\Campaign\CampaignSharingStatus;
use Telnyx\Messaging10dlc\PartnerCampaigns\PartnerCampaignListParams\Sort;
use Telnyx\Messaging10dlc\PartnerCampaigns\PartnerCampaignListSharedByMeResponse;
use Telnyx\Messaging10dlc\PartnerCampaigns\TelnyxDownstreamCampaign;
use Telnyx\PerPagePaginationV2;
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
     * @return PerPagePaginationV2<TelnyxDownstreamCampaign>
     *
     * @throws APIException
     */
    public function list(
        int $page = 1,
        int $recordsPerPage = 10,
        string|Sort $sort = '-createdAt',
        ?RequestOptions $requestOptions = null,
    ): PerPagePaginationV2;

    /**
     * @api
     *
     * @param int $page The 1-indexed page number to get. The default value is `1`.
     * @param int $recordsPerPage The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
     *
     * @return PerPagePaginationV2<PartnerCampaignListSharedByMeResponse>
     *
     * @throws APIException
     */
    public function listSharedByMe(
        int $page = 1,
        int $recordsPerPage = 10,
        ?RequestOptions $requestOptions = null,
    ): PerPagePaginationV2;

    /**
     * @api
     *
     * @param string $campaignID ID of the campaign in question
     *
     * @return array<string,CampaignSharingStatus>
     *
     * @throws APIException
     */
    public function retrieveSharingStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): array;
}
