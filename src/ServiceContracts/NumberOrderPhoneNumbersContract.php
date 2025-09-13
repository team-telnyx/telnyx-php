<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberGetResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListParams\Filter;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementsResponse;
use Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface NumberOrderPhoneNumbersContract
{
    /**
     * @api
     *
     * @return NumberOrderPhoneNumberGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberOrderPhoneNumberID,
        ?RequestOptions $requestOptions = null
    ): NumberOrderPhoneNumberGetResponse;

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
    ): NumberOrderPhoneNumberGetResponse;

    /**
     * @api
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
    ): NumberOrderPhoneNumberListResponse;

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
    ): NumberOrderPhoneNumberListResponse;

    /**
     * @api
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
    ): NumberOrderPhoneNumberUpdateRequirementGroupResponse;

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
    ): NumberOrderPhoneNumberUpdateRequirementGroupResponse;

    /**
     * @api
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
    ): NumberOrderPhoneNumberUpdateRequirementsResponse;

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
    ): NumberOrderPhoneNumberUpdateRequirementsResponse;
}
