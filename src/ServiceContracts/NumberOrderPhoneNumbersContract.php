<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

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
     */
    public function retrieve(
        string $numberOrderPhoneNumberID,
        ?RequestOptions $requestOptions = null
    ): NumberOrderPhoneNumberGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[country_code]
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): NumberOrderPhoneNumberListResponse;

    /**
     * @api
     *
     * @param string $requirementGroupID The ID of the requirement group to associate
     */
    public function updateRequirementGroup(
        string $id,
        $requirementGroupID,
        ?RequestOptions $requestOptions = null
    ): NumberOrderPhoneNumberUpdateRequirementGroupResponse;

    /**
     * @api
     *
     * @param list<UpdateRegulatoryRequirement> $regulatoryRequirements
     */
    public function updateRequirements(
        string $numberOrderPhoneNumberID,
        $regulatoryRequirements = omit,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderPhoneNumberUpdateRequirementsResponse;
}
