<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\Campaign\CampaignSharingStatus;
use Telnyx\PartnerCampaigns\PartnerCampaignListParams;
use Telnyx\PartnerCampaigns\PartnerCampaignListParams\Sort;
use Telnyx\PartnerCampaigns\PartnerCampaignListSharedByMeParams;
use Telnyx\PartnerCampaigns\PartnerCampaignListSharedByMeResponse;
use Telnyx\PartnerCampaigns\PartnerCampaignUpdateParams;
use Telnyx\PartnerCampaigns\TelnyxDownstreamCampaign;
use Telnyx\PerPagePaginationV2;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PartnerCampaignsRawContract;

final class PartnerCampaignsRawService implements PartnerCampaignsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve campaign details by `campaignId`.
     *
     * @return BaseResponse<TelnyxDownstreamCampaign>
     *
     * @throws APIException
     */
    public function retrieve(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['10dlc/partner_campaigns/%1$s', $campaignID],
            options: $requestOptions,
            convert: TelnyxDownstreamCampaign::class,
        );
    }

    /**
     * @api
     *
     * Update campaign details by `campaignId`. **Please note:** Only webhook urls are editable.
     *
     * @param array{
     *   webhookFailoverURL?: string, webhookURL?: string
     * }|PartnerCampaignUpdateParams $params
     *
     * @return BaseResponse<TelnyxDownstreamCampaign>
     *
     * @throws APIException
     */
    public function update(
        string $campaignID,
        array|PartnerCampaignUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PartnerCampaignUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['10dlc/partner_campaigns/%1$s', $campaignID],
            body: (object) $parsed,
            options: $options,
            convert: TelnyxDownstreamCampaign::class,
        );
    }

    /**
     * @api
     *
     * Retrieve all partner campaigns you have shared to Telnyx in a paginated fashion.
     *
     * This endpoint is currently limited to only returning shared campaigns that Telnyx has accepted. In other words, shared but pending campaigns are currently omitted from the response from this endpoint.
     *
     * @param array{
     *   page?: int, recordsPerPage?: int, sort?: value-of<Sort>
     * }|PartnerCampaignListParams $params
     *
     * @return BaseResponse<PerPagePaginationV2<TelnyxDownstreamCampaign>>
     *
     * @throws APIException
     */
    public function list(
        array|PartnerCampaignListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PartnerCampaignListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: '10dlc/partner_campaigns',
            query: $parsed,
            options: $options,
            convert: TelnyxDownstreamCampaign::class,
            page: PerPagePaginationV2::class,
        );
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
     * @param array{
     *   page?: int, recordsPerPage?: int
     * }|PartnerCampaignListSharedByMeParams $params
     *
     * @return BaseResponse<PerPagePaginationV2<PartnerCampaignListSharedByMeResponse>>
     *
     * @throws APIException
     */
    public function listSharedByMe(
        array|PartnerCampaignListSharedByMeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PartnerCampaignListSharedByMeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: '10dlc/partnerCampaign/sharedByMe',
            query: $parsed,
            options: $options,
            convert: PartnerCampaignListSharedByMeResponse::class,
            page: PerPagePaginationV2::class,
        );
    }

    /**
     * @api
     *
     * Get Sharing Status
     *
     * @param string $campaignID ID of the campaign in question
     *
     * @return BaseResponse<array<string,CampaignSharingStatus>>
     *
     * @throws APIException
     */
    public function retrieveSharingStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['10dlc/partnerCampaign/%1$s/sharing', $campaignID],
            options: $requestOptions,
            convert: new MapOf(CampaignSharingStatus::class),
        );
    }
}
