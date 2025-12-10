<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging10dlc;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Messaging10dlc\Campaign\CampaignSharingStatus;
use Telnyx\Messaging10dlc\PartnerCampaigns\PartnerCampaignListParams\Sort;
use Telnyx\Messaging10dlc\PartnerCampaigns\PartnerCampaignListSharedByMeResponse;
use Telnyx\Messaging10dlc\PartnerCampaigns\TelnyxDownstreamCampaign;
use Telnyx\PerPagePaginationV2;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging10dlc\PartnerCampaignsContract;

final class PartnerCampaignsService implements PartnerCampaignsContract
{
    /**
     * @api
     */
    public PartnerCampaignsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PartnerCampaignsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve campaign details by `campaignId`.
     *
     * @throws APIException
     */
    public function retrieve(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): TelnyxDownstreamCampaign {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($campaignID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update campaign details by `campaignId`. **Please note:** Only webhook urls are editable.
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
    ): TelnyxDownstreamCampaign {
        $params = Util::removeNulls(
            ['webhookFailoverURL' => $webhookFailoverURL, 'webhookURL' => $webhookURL]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($campaignID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve all partner campaigns you have shared to Telnyx in a paginated fashion.
     *
     * This endpoint is currently limited to only returning shared campaigns that Telnyx has accepted. In other words, shared but pending campaigns are currently omitted from the response from this endpoint.
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
    ): PerPagePaginationV2 {
        $params = Util::removeNulls(
            ['page' => $page, 'recordsPerPage' => $recordsPerPage, 'sort' => $sort]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all partner campaigns you have shared to Telnyx in a paginated fashion
     *
     * This endpoint is currently limited to only returning shared campaigns that Telnyx
     * has accepted. In other words, shared but pending campaigns are currently omitted
     * from the response from this endpoint.
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
    ): PerPagePaginationV2 {
        $params = Util::removeNulls(
            ['page' => $page, 'recordsPerPage' => $recordsPerPage]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listSharedByMe(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get Sharing Status
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
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveSharingStatus($campaignID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
