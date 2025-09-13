<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
use Telnyx\ServiceContracts\NumberOrderPhoneNumbersContract;

use const Telnyx\Core\OMIT as omit;

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
     * @return NumberOrderPhoneNumberGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberOrderPhoneNumberID,
        ?RequestOptions $requestOptions = null
    ): NumberOrderPhoneNumberGetResponse {
        $params = [];

        return $this->retrieveRaw(
            $numberOrderPhoneNumberID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @return NumberOrderPhoneNumberGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $numberOrderPhoneNumberID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderPhoneNumberGetResponse {
        // @phpstan-ignore-next-line;
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[country_code]
     *
     * @return NumberOrderPhoneNumberListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): NumberOrderPhoneNumberListResponse {
        $params = ['filter' => $filter];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return NumberOrderPhoneNumberListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): NumberOrderPhoneNumberListResponse {
        [$parsed, $options] = NumberOrderPhoneNumberListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param string $requirementGroupID The ID of the requirement group to associate
     *
     * @return NumberOrderPhoneNumberUpdateRequirementGroupResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $id,
        $requirementGroupID,
        ?RequestOptions $requestOptions = null
    ): NumberOrderPhoneNumberUpdateRequirementGroupResponse {
        $params = ['requirementGroupID' => $requirementGroupID];

        return $this->updateRequirementGroupRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return NumberOrderPhoneNumberUpdateRequirementGroupResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRequirementGroupRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): NumberOrderPhoneNumberUpdateRequirementGroupResponse {
        [
            $parsed, $options,
        ] = NumberOrderPhoneNumberUpdateRequirementGroupParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param list<UpdateRegulatoryRequirement> $regulatoryRequirements
     *
     * @return NumberOrderPhoneNumberUpdateRequirementsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRequirements(
        string $numberOrderPhoneNumberID,
        $regulatoryRequirements = omit,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderPhoneNumberUpdateRequirementsResponse {
        $params = ['regulatoryRequirements' => $regulatoryRequirements];

        return $this->updateRequirementsRaw(
            $numberOrderPhoneNumberID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return NumberOrderPhoneNumberUpdateRequirementsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRequirementsRaw(
        string $numberOrderPhoneNumberID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderPhoneNumberUpdateRequirementsResponse {
        [
            $parsed, $options,
        ] = NumberOrderPhoneNumberUpdateRequirementsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['number_order_phone_numbers/%1$s', $numberOrderPhoneNumberID],
            body: (object) $parsed,
            options: $options,
            convert: NumberOrderPhoneNumberUpdateRequirementsResponse::class,
        );
    }
}
