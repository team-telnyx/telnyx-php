<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Campaign\CampaignSharingStatus;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PartnerCampaigns\PartnerCampaignListParams\Sort;
use Telnyx\PartnerCampaigns\PartnerCampaignListResponse;
use Telnyx\PartnerCampaigns\PartnerCampaignListSharedByMeResponse;
use Telnyx\PartnerCampaigns\TelnyxDownstreamCampaign;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface PartnerCampaignsContract
{
    /**
     * @api
     *
     * @return TelnyxDownstreamCampaign<HasRawResponse>
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
     * @return TelnyxDownstreamCampaign<HasRawResponse>
     */
    public function update(
        string $campaignID,
        $webhookFailoverURL = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): TelnyxDownstreamCampaign;

    /**
     * @api
     *
     * @param int $page The 1-indexed page number to get. The default value is `1`.
     * @param int $recordsPerPage The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     *
     * @return PartnerCampaignListResponse<HasRawResponse>
     */
    public function list(
        $page = omit,
        $recordsPerPage = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): PartnerCampaignListResponse;

    /**
     * @api
     *
     * @param int $page The 1-indexed page number to get. The default value is `1`.
     * @param int $recordsPerPage The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
     *
     * @return PartnerCampaignListSharedByMeResponse<HasRawResponse>
     */
    public function listSharedByMe(
        $page = omit,
        $recordsPerPage = omit,
        ?RequestOptions $requestOptions = null,
    ): PartnerCampaignListSharedByMeResponse;

    /**
     * @api
     *
     * @return array<string, CampaignSharingStatus>
     */
    public function retrieveSharingStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): array;
}
