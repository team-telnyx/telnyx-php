<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RequirementGroups\RequirementGroup;
use Telnyx\RequirementGroups\RequirementGroupCreateParams\Action;
use Telnyx\RequirementGroups\RequirementGroupCreateParams\PhoneNumberType;
use Telnyx\RequirementGroups\RequirementGroupCreateParams\RegulatoryRequirement;
use Telnyx\RequirementGroups\RequirementGroupListParams\Filter;

/**
 * @phpstan-import-type RegulatoryRequirementShape from \Telnyx\RequirementGroups\RequirementGroupCreateParams\RegulatoryRequirement
 * @phpstan-import-type RegulatoryRequirementShape from \Telnyx\RequirementGroups\RequirementGroupUpdateParams\RegulatoryRequirement as RegulatoryRequirementShape1
 * @phpstan-import-type FilterShape from \Telnyx\RequirementGroups\RequirementGroupListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RequirementGroupsContract
{
    /**
     * @api
     *
     * @param Action|value-of<Action> $action
     * @param string $countryCode ISO alpha 2 country code
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     * @param list<RegulatoryRequirement|RegulatoryRequirementShape> $regulatoryRequirements
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        Action|string $action,
        string $countryCode,
        PhoneNumberType|string $phoneNumberType,
        ?string $customerReference = null,
        ?array $regulatoryRequirements = null,
        RequestOptions|array|null $requestOptions = null,
    ): RequirementGroup;

    /**
     * @api
     *
     * @param string $id ID of the requirement group to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): RequirementGroup;

    /**
     * @api
     *
     * @param string $id ID of the requirement group
     * @param string $customerReference Reference for the customer
     * @param list<\Telnyx\RequirementGroups\RequirementGroupUpdateParams\RegulatoryRequirement|RegulatoryRequirementShape1> $regulatoryRequirements
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $customerReference = null,
        ?array $regulatoryRequirements = null,
        RequestOptions|array|null $requestOptions = null,
    ): RequirementGroup;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action], filter[status], filter[customer_reference]
     * @param RequestOpts|null $requestOptions
     *
     * @return list<RequirementGroup>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): array;

    /**
     * @api
     *
     * @param string $id ID of the requirement group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): RequirementGroup;

    /**
     * @api
     *
     * @param string $id ID of the requirement group to submit
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function submitForApproval(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): RequirementGroup;
}
