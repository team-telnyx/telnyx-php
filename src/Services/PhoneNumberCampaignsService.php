<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PerPagePaginationV2;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaign;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignCreateParams;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListParams;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Sort;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumberCampaignsContract;

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
     * @param array{
     *   campaignId: string, phoneNumber: string
     * }|PhoneNumberCampaignCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|PhoneNumberCampaignCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberCampaign {
        [$parsed, $options] = PhoneNumberCampaignCreateParams::parseRequest(
            $params,
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
     * @throws APIException
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
     * @param array{
     *   campaignId: string, phoneNumber: string
     * }|PhoneNumberCampaignUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $campaignPhoneNumber,
        array|PhoneNumberCampaignUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberCampaign {
        [$parsed, $options] = PhoneNumberCampaignUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['phone_number_campaigns/%1$s', $campaignPhoneNumber],
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
     * @param array{
     *   filter?: array{
     *     tcr_brand_id?: string,
     *     tcr_campaign_id?: string,
     *     telnyx_brand_id?: string,
     *     telnyx_campaign_id?: string,
     *   },
     *   page?: int,
     *   recordsPerPage?: int,
     *   sort?: value-of<Sort>,
     * }|PhoneNumberCampaignListParams $params
     *
     * @return PerPagePaginationV2<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function list(
        array|PhoneNumberCampaignListParams $params,
        ?RequestOptions $requestOptions = null,
    ): PerPagePaginationV2 {
        [$parsed, $options] = PhoneNumberCampaignListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'phone_number_campaigns',
            query: $parsed,
            options: $options,
            convert: PhoneNumberCampaign::class,
            page: PerPagePaginationV2::class,
        );
    }

    /**
     * @api
     *
     * This endpoint allows you to remove a campaign assignment from the supplied `phoneNumber`.
     *
     * @throws APIException
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
