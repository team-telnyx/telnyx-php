<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaign;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignCreateParams;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListParams;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Sort;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListResponse;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumberCampaignsRawContract;

final class PhoneNumberCampaignsRawService implements PhoneNumberCampaignsRawContract
{
    // @phpstan-ignore-next-line
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
     *   campaignID: string, phoneNumber: string
     * }|PhoneNumberCampaignCreateParams $params
     *
     * @return BaseResponse<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function create(
        array|PhoneNumberCampaignCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberCampaignCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: '10dlc/phone_number_campaigns',
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
     * @return BaseResponse<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['10dlc/phone_number_campaigns/%1$s', $phoneNumber],
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
     *   campaignID: string, phoneNumber: string
     * }|PhoneNumberCampaignUpdateParams $params
     *
     * @return BaseResponse<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumber,
        array|PhoneNumberCampaignUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberCampaignUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['10dlc/phone_number_campaigns/%1$s', $phoneNumber],
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
     *     tcrBrandID?: string,
     *     tcrCampaignID?: string,
     *     telnyxBrandID?: string,
     *     telnyxCampaignID?: string,
     *   },
     *   page?: int,
     *   recordsPerPage?: int,
     *   sort?: value-of<Sort>,
     * }|PhoneNumberCampaignListParams $params
     *
     * @return BaseResponse<PhoneNumberCampaignListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|PhoneNumberCampaignListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberCampaignListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: '10dlc/phone_number_campaigns',
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
     * @return BaseResponse<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['10dlc/phone_number_campaigns/%1$s', $phoneNumber],
            options: $requestOptions,
            convert: PhoneNumberCampaign::class,
        );
    }
}
