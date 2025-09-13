<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Campaign\CampaignSharingStatus;
use Telnyx\Core\Exceptions\APIException;
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
     * @return TelnyxDownstreamCampaign<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $campaignID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): TelnyxDownstreamCampaign;

    /**
     * @api
     *
     * @param string $webhookFailoverURL webhook failover to which campaign status updates are sent
     * @param string $webhookURL webhook to which campaign status updates are sent
     *
     * @return TelnyxDownstreamCampaign<HasRawResponse>
     *
     * @throws APIException
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
     * @param array<string, mixed> $params
     *
     * @return TelnyxDownstreamCampaign<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $campaignID,
        array $params,
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
     *
     * @throws APIException
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
     * @param array<string, mixed> $params
     *
     * @return PartnerCampaignListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PartnerCampaignListResponse;

    /**
     * @api
     *
     * @param int $page The 1-indexed page number to get. The default value is `1`.
     * @param int $recordsPerPage The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
     *
     * @return PartnerCampaignListSharedByMeResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listSharedByMe(
        $page = omit,
        $recordsPerPage = omit,
        ?RequestOptions $requestOptions = null,
    ): PartnerCampaignListSharedByMeResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PartnerCampaignListSharedByMeResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listSharedByMeRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PartnerCampaignListSharedByMeResponse;

    /**
     * @api
     *
     * @return array<string, CampaignSharingStatus>
     *
     * @throws APIException
     */
    public function retrieveSharingStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @return array<string, CampaignSharingStatus>
     *
     * @throws APIException
     */
    public function retrieveSharingStatusRaw(
        string $campaignID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): array;
}
