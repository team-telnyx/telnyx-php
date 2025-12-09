<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberGetResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementsResponse;
use Telnyx\RequestOptions;

interface NumberOrderPhoneNumbersContract
{
    /**
     * @api
     *
     * @param string $numberOrderPhoneNumberID the number order phone number ID
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
     * @param array{
     *   countryCode?: string
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[country_code]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): NumberOrderPhoneNumberListResponse;

    /**
     * @api
     *
     * @param string $id The unique identifier of the number order phone number
     * @param string $requirementGroupID The ID of the requirement group to associate
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $id,
        string $requirementGroupID,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderPhoneNumberUpdateRequirementGroupResponse;

    /**
     * @api
     *
     * @param string $numberOrderPhoneNumberID the number order phone number ID
     * @param list<array{
     *   fieldValue?: string, requirementID?: string
     * }> $regulatoryRequirements
     *
     * @throws APIException
     */
    public function updateRequirements(
        string $numberOrderPhoneNumberID,
        ?array $regulatoryRequirements = null,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderPhoneNumberUpdateRequirementsResponse;
}
