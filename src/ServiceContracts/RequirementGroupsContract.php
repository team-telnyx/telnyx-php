<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\RequestOptions;
use Telnyx\RequirementGroups\RequirementGroup;
use Telnyx\RequirementGroups\RequirementGroupCreateParams\Action;
use Telnyx\RequirementGroups\RequirementGroupCreateParams\PhoneNumberType;
use Telnyx\RequirementGroups\RequirementGroupCreateParams\RegulatoryRequirement;
use Telnyx\RequirementGroups\RequirementGroupListParams\Filter;
use Telnyx\RequirementGroups\RequirementGroupUpdateParams\RegulatoryRequirement as RegulatoryRequirement1;

use const Telnyx\Core\OMIT as omit;

interface RequirementGroupsContract
{
    /**
     * @api
     *
     * @param Action|value-of<Action> $action
     * @param string $countryCode ISO alpha 2 country code
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     * @param string $customerReference
     * @param list<RegulatoryRequirement> $regulatoryRequirements
     */
    public function create(
        $action,
        $countryCode,
        $phoneNumberType,
        $customerReference = omit,
        $regulatoryRequirements = omit,
        ?RequestOptions $requestOptions = null,
    ): RequirementGroup;

    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup;

    /**
     * @api
     *
     * @param string $customerReference Reference for the customer
     * @param list<RegulatoryRequirement1> $regulatoryRequirements
     */
    public function update(
        string $id,
        $customerReference = omit,
        $regulatoryRequirements = omit,
        ?RequestOptions $requestOptions = null,
    ): RequirementGroup;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action], filter[status], filter[customer_reference]
     *
     * @return list<RequirementGroup>
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup;

    /**
     * @api
     */
    public function submitForApproval(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup;
}
