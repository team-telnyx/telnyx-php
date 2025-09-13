<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaign;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignCreateParams;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListParams;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Filter;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Sort;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListResponse;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumberCampaignsContract;

use const Telnyx\Core\OMIT as omit;

final class PhoneNumberCampaignsService implements PhoneNumberCampaignsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create New Phone Number Campaign
     *
     * @param string $campaignID the ID of the campaign you want to link to the specified phone number
     * @param string $phoneNumber the phone number you want to link to a specified campaign
     *
     * @return PhoneNumberCampaign<HasRawResponse>
     */
    public function create(
        $campaignID,
        $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberCampaign {
        [$parsed, $options] = PhoneNumberCampaignCreateParams::parseRequest(
            ['campaignID' => $campaignID, 'phoneNumber' => $phoneNumber],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'phone_number_campaigns',
            body: (object) $parsed,
            options: $options,
            convert: PhoneNumberCampaign::class,
        );
    }

    /**
     * @api
     *
     * Retrieve an individual phone number/campaign assignment by `phoneNumber`.
     *
     * @return PhoneNumberCampaign<HasRawResponse>
     */
    public function retrieve(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberCampaign {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['phone_number_campaigns/%1$s', $phoneNumber],
            options: $requestOptions,
            convert: PhoneNumberCampaign::class,
        );
    }

    /**
     * @api
     *
     * Create New Phone Number Campaign
     *
     * @param string $campaignID the ID of the campaign you want to link to the specified phone number
     * @param string $phoneNumber1 the phone number you want to link to a specified campaign
     *
     * @return PhoneNumberCampaign<HasRawResponse>
     */
    public function update(
        string $phoneNumber,
        $campaignID,
        $phoneNumber1,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberCampaign {
        [$parsed, $options] = PhoneNumberCampaignUpdateParams::parseRequest(
            ['campaignID' => $campaignID, 'phoneNumber' => $phoneNumber1],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['phone_number_campaigns/%1$s', $phoneNumber],
            body: (object) $parsed,
            options: $options,
            convert: PhoneNumberCampaign::class,
        );
    }

    /**
     * @api
     *
     * Retrieve All Phone Number Campaigns
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[telnyx_campaign_id], filter[telnyx_brand_id], filter[tcr_campaign_id], filter[tcr_brand_id]
     * @param int $page
     * @param int $recordsPerPage
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     *
     * @return PhoneNumberCampaignListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        $recordsPerPage = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberCampaignListResponse {
        [$parsed, $options] = PhoneNumberCampaignListParams::parseRequest(
            [
                'filter' => $filter,
                'page' => $page,
                'recordsPerPage' => $recordsPerPage,
                'sort' => $sort,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'phone_number_campaigns',
            query: $parsed,
            options: $options,
            convert: PhoneNumberCampaignListResponse::class,
        );
    }

    /**
     * @api
     *
     * This endpoint allows you to remove a campaign assignment from the supplied `phoneNumber`.
     *
     * @return PhoneNumberCampaign<HasRawResponse>
     */
    public function delete(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberCampaign {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['phone_number_campaigns/%1$s', $phoneNumber],
            options: $requestOptions,
            convert: PhoneNumberCampaign::class,
        );
    }
}
