<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberGetResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListParams;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupParams;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementsParams;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementsResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberOrderPhoneNumbersContract;

final class NumberOrderPhoneNumbersService implements NumberOrderPhoneNumbersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get an existing phone number in number order.
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberOrderPhoneNumberID,
        ?RequestOptions $requestOptions = null
    ): NumberOrderPhoneNumberGetResponse {
        /** @var BaseResponse<NumberOrderPhoneNumberGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['number_order_phone_numbers/%1$s', $numberOrderPhoneNumberID],
            options: $requestOptions,
            convert: NumberOrderPhoneNumberGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a list of phone numbers associated to orders.
     *
     * @param array{
     *   filter?: array{country_code?: string}
     * }|NumberOrderPhoneNumberListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|NumberOrderPhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderPhoneNumberListResponse {
        [$parsed, $options] = NumberOrderPhoneNumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NumberOrderPhoneNumberListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'number_order_phone_numbers',
            query: $parsed,
            options: $options,
            convert: NumberOrderPhoneNumberListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update requirement group for a phone number order
     *
     * @param array{
     *   requirement_group_id: string
     * }|NumberOrderPhoneNumberUpdateRequirementGroupParams $params
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $id,
        array|NumberOrderPhoneNumberUpdateRequirementGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderPhoneNumberUpdateRequirementGroupResponse {
        [$parsed, $options] = NumberOrderPhoneNumberUpdateRequirementGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NumberOrderPhoneNumberUpdateRequirementGroupResponse,> */
        $response = $this->client->request(
            method: 'post',
            path: ['number_order_phone_numbers/%1$s/requirement_group', $id],
            body: (object) $parsed,
            options: $options,
            convert: NumberOrderPhoneNumberUpdateRequirementGroupResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates requirements for a single phone number within a number order.
     *
     * @param array{
     *   regulatory_requirements?: list<array{
     *     field_value?: string, requirement_id?: string
     *   }>,
     * }|NumberOrderPhoneNumberUpdateRequirementsParams $params
     *
     * @throws APIException
     */
    public function updateRequirements(
        string $numberOrderPhoneNumberID,
        array|NumberOrderPhoneNumberUpdateRequirementsParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderPhoneNumberUpdateRequirementsResponse {
        [$parsed, $options] = NumberOrderPhoneNumberUpdateRequirementsParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NumberOrderPhoneNumberUpdateRequirementsResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['number_order_phone_numbers/%1$s', $numberOrderPhoneNumberID],
            body: (object) $parsed,
            options: $options,
            convert: NumberOrderPhoneNumberUpdateRequirementsResponse::class,
        );

        return $response->parse();
    }
}
