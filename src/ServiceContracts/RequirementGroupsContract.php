<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RequirementGroups\RequirementGroup;
use Telnyx\RequirementGroups\RequirementGroupListParams\Filter\Action;
use Telnyx\RequirementGroups\RequirementGroupListParams\Filter\PhoneNumberType;
use Telnyx\RequirementGroups\RequirementGroupListParams\Filter\Status;

interface RequirementGroupsContract
{
    /**
     * @api
     *
     * @param 'ordering'|'porting'|\Telnyx\RequirementGroups\RequirementGroupCreateParams\Action $action
     * @param string $countryCode ISO alpha 2 country code
     * @param 'local'|'toll_free'|'mobile'|'national'|'shared_cost'|\Telnyx\RequirementGroups\RequirementGroupCreateParams\PhoneNumberType $phoneNumberType
     * @param list<array{
     *   fieldValue?: string, requirementID?: string
     * }> $regulatoryRequirements
     *
     * @throws APIException
     */
    public function create(
        string|\Telnyx\RequirementGroups\RequirementGroupCreateParams\Action $action,
        string $countryCode,
        string|\Telnyx\RequirementGroups\RequirementGroupCreateParams\PhoneNumberType $phoneNumberType,
        ?string $customerReference = null,
        ?array $regulatoryRequirements = null,
        ?RequestOptions $requestOptions = null,
    ): RequirementGroup;

    /**
     * @api
     *
     * @param string $id ID of the requirement group to retrieve
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup;

    /**
     * @api
     *
     * @param string $id ID of the requirement group
     * @param string $customerReference Reference for the customer
     * @param list<array{
     *   fieldValue?: string, requirementID?: string
     * }> $regulatoryRequirements
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $customerReference = null,
        ?array $regulatoryRequirements = null,
        ?RequestOptions $requestOptions = null,
    ): RequirementGroup;

    /**
     * @api
     *
     * @param array{
     *   action?: 'ordering'|'porting'|'action'|Action,
     *   countryCode?: string,
     *   customerReference?: string,
     *   phoneNumberType?: 'local'|'toll_free'|'mobile'|'national'|'shared_cost'|PhoneNumberType,
     *   status?: 'approved'|'unapproved'|'pending-approval'|'declined'|'expired'|Status,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action], filter[status], filter[customer_reference]
     *
     * @return list<RequirementGroup>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param string $id ID of the requirement group
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup;

    /**
     * @api
     *
     * @param string $id ID of the requirement group to submit
     *
     * @throws APIException
     */
    public function submitForApproval(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup;
}
