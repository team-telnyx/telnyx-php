<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging10dlc;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaign;
use Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaignCreateParams;
use Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaignListParams;
use Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Filter;
use Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Sort;
use Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaignUpdateParams;
use Telnyx\PerPagePaginationV2;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging10dlc\PhoneNumberCampaignsRawContract;

/**
 * Phone number campaign assignment.
 *
 * @phpstan-import-type FilterShape from \Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function create(
        array|PhoneNumberCampaignCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function update(
        string $campaignPhoneNumber,
        array|PhoneNumberCampaignUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberCampaignUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['10dlc/phone_number_campaigns/%1$s', $campaignPhoneNumber],
            body: (object) $parsed,
            options: $options,
            convert: PhoneNumberCampaign::class,
        );
    }

    /**
     * @api
     *
     * List phone number campaigns
     *
     * @param array{
     *   filter?: Filter|FilterShape,
     *   page?: int,
     *   recordsPerPage?: int,
     *   sort?: value-of<Sort>,
     * }|PhoneNumberCampaignListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PerPagePaginationV2<PhoneNumberCampaign>>
     *
     * @throws APIException
     */
    public function list(
        array|PhoneNumberCampaignListParams $params,
        RequestOptions|array|null $requestOptions = null,
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
            convert: PhoneNumberCampaign::class,
            page: PerPagePaginationV2::class,
        );
    }

    /**
     * @api
     *
     * This endpoint allows you to remove a campaign assignment from the supplied `phoneNumber`.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
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
