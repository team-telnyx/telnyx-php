<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberGetResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListParams;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListParams\Filter;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupParams;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementsParams;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementsResponse;
use Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberOrderPhoneNumbersRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListParams\Filter
 * @phpstan-import-type UpdateRegulatoryRequirementShape from \Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NumberOrderPhoneNumbersRawService implements NumberOrderPhoneNumbersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get an existing phone number in number order.
     *
     * @param string $numberOrderPhoneNumberID the number order phone number ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberOrderPhoneNumberGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberOrderPhoneNumberID,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['number_order_phone_numbers/%1$s', $numberOrderPhoneNumberID],
            options: $requestOptions,
            convert: NumberOrderPhoneNumberGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a list of phone numbers associated to orders.
     *
     * @param array{
     *   filter?: Filter|FilterShape
     * }|NumberOrderPhoneNumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberOrderPhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|NumberOrderPhoneNumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberOrderPhoneNumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'number_order_phone_numbers',
            query: $parsed,
            options: $options,
            convert: NumberOrderPhoneNumberListResponse::class,
        );
    }

    /**
     * @api
     *
     * Update requirement group for a phone number order
     *
     * @param string $id The unique identifier of the number order phone number
     * @param array{
     *   requirementGroupID: string
     * }|NumberOrderPhoneNumberUpdateRequirementGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberOrderPhoneNumberUpdateRequirementGroupResponse>
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $id,
        array|NumberOrderPhoneNumberUpdateRequirementGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberOrderPhoneNumberUpdateRequirementGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['number_order_phone_numbers/%1$s/requirement_group', $id],
            body: (object) $parsed,
            options: $options,
            convert: NumberOrderPhoneNumberUpdateRequirementGroupResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates requirements for a single phone number within a number order.
     *
     * @param string $numberOrderPhoneNumberID the number order phone number ID
     * @param array{
     *   regulatoryRequirements?: list<UpdateRegulatoryRequirement|UpdateRegulatoryRequirementShape>,
     * }|NumberOrderPhoneNumberUpdateRequirementsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberOrderPhoneNumberUpdateRequirementsResponse>
     *
     * @throws APIException
     */
    public function updateRequirements(
        string $numberOrderPhoneNumberID,
        array|NumberOrderPhoneNumberUpdateRequirementsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberOrderPhoneNumberUpdateRequirementsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['number_order_phone_numbers/%1$s', $numberOrderPhoneNumberID],
            body: (object) $parsed,
            options: $options,
            convert: NumberOrderPhoneNumberUpdateRequirementsResponse::class,
        );
    }
}
