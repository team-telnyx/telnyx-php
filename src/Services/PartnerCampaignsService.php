<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Campaign\CampaignSharingStatus;
use Telnyx\Client;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PartnerCampaigns\PartnerCampaignListParams;
use Telnyx\PartnerCampaigns\PartnerCampaignListParams\Sort;
use Telnyx\PartnerCampaigns\PartnerCampaignListResponse;
use Telnyx\PartnerCampaigns\PartnerCampaignListSharedByMeParams;
use Telnyx\PartnerCampaigns\PartnerCampaignListSharedByMeResponse;
use Telnyx\PartnerCampaigns\PartnerCampaignUpdateParams;
use Telnyx\PartnerCampaigns\TelnyxDownstreamCampaign;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PartnerCampaignsContract;

final class PartnerCampaignsService implements PartnerCampaignsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['partner_campaigns/%1$s', $campaignID],
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
     * @throws APIException
     */
    public function update(
        string $campaignID,
        array|PartnerCampaignUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TelnyxDownstreamCampaign {
        [$parsed, $options] = PartnerCampaignUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['partner_campaigns/%1$s', $campaignID],
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
     * @throws APIException
     */
    public function list(
        array|PartnerCampaignListParams $params,
        ?RequestOptions $requestOptions = null,
    ): PartnerCampaignListResponse {
        [$parsed, $options] = PartnerCampaignListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'partner_campaigns',
            query: $parsed,
            options: $options,
            convert: PartnerCampaignListResponse::class,
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
     * @throws APIException
     */
    public function listSharedByMe(
        array|PartnerCampaignListSharedByMeParams $params,
        ?RequestOptions $requestOptions = null,
    ): PartnerCampaignListSharedByMeResponse {
        [$parsed, $options] = PartnerCampaignListSharedByMeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'partnerCampaign/sharedByMe',
            query: $parsed,
            options: $options,
            convert: PartnerCampaignListSharedByMeResponse::class,
        );
    }

    /**
     * @api
     *
     * Get Sharing Status
     *
     * @return array<string,CampaignSharingStatus>
     *
     * @throws APIException
     */
    public function retrieveSharingStatus(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['partnerCampaign/%1$s/sharing', $campaignID],
            options: $requestOptions,
            convert: new MapOf(CampaignSharingStatus::class),
        );
    }
}
