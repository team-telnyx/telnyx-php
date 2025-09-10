<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Campaign\CampaignSharingStatus;
use Telnyx\Client;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\PartnerCampaigns\PartnerCampaignListParams;
use Telnyx\PartnerCampaigns\PartnerCampaignListParams\Sort;
use Telnyx\PartnerCampaigns\PartnerCampaignListResponse;
use Telnyx\PartnerCampaigns\PartnerCampaignListSharedByMeParams;
use Telnyx\PartnerCampaigns\PartnerCampaignListSharedByMeResponse;
use Telnyx\PartnerCampaigns\PartnerCampaignUpdateParams;
use Telnyx\PartnerCampaigns\TelnyxDownstreamCampaign;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PartnerCampaignsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $webhookFailoverURL webhook failover to which campaign status updates are sent
     * @param string $webhookURL webhook to which campaign status updates are sent
     */
    public function update(
        string $campaignID,
        $webhookFailoverURL = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): TelnyxDownstreamCampaign {
        [$parsed, $options] = PartnerCampaignUpdateParams::parseRequest(
            [
                'webhookFailoverURL' => $webhookFailoverURL, 'webhookURL' => $webhookURL,
            ],
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
     * @param int $page The 1-indexed page number to get. The default value is `1`.
     * @param int $recordsPerPage The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     */
    public function list(
        $page = omit,
        $recordsPerPage = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): PartnerCampaignListResponse {
        [$parsed, $options] = PartnerCampaignListParams::parseRequest(
            ['page' => $page, 'recordsPerPage' => $recordsPerPage, 'sort' => $sort],
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
     * @param int $page The 1-indexed page number to get. The default value is `1`.
     * @param int $recordsPerPage The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
     */
    public function listSharedByMe(
        $page = omit,
        $recordsPerPage = omit,
        ?RequestOptions $requestOptions = null
    ): PartnerCampaignListSharedByMeResponse {
        [$parsed, $options] = PartnerCampaignListSharedByMeParams::parseRequest(
            ['page' => $page, 'recordsPerPage' => $recordsPerPage],
            $requestOptions
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
     * @return array<string, CampaignSharingStatus>
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
