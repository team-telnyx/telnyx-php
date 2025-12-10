<?php

declare(strict_types=1);

namespace Telnyx\Services\Number10dlc;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\PartnerCampaigns\PartnerCampaignListParams;
use Telnyx\Number10dlc\PartnerCampaigns\PartnerCampaignListParams\Sort;
use Telnyx\Number10dlc\PartnerCampaigns\PartnerCampaignListResponse;
use Telnyx\Number10dlc\PartnerCampaigns\PartnerCampaignUpdateParams;
use Telnyx\PartnerCampaigns\TelnyxDownstreamCampaign;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Number10dlc\PartnerCampaignsRawContract;

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
     * @return BaseResponse<PartnerCampaignListResponse>
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
            convert: PartnerCampaignListResponse::class,
        );
    }
}
