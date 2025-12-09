<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RequirementGroups\RequirementGroup;
use Telnyx\RequirementGroups\RequirementGroupListParams\Filter\Action;
use Telnyx\RequirementGroups\RequirementGroupListParams\Filter\PhoneNumberType;
use Telnyx\RequirementGroups\RequirementGroupListParams\Filter\Status;
use Telnyx\ServiceContracts\RequirementGroupsContract;

final class RequirementGroupsService implements RequirementGroupsContract
{
    /**
     * @api
     */
    public RequirementGroupsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RequirementGroupsRawService($client);
    }

    /**
     * @api
     *
     * Create a new requirement group
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
    ): RequirementGroup {
        $params = [
            'action' => $action,
            'countryCode' => $countryCode,
            'phoneNumberType' => $phoneNumberType,
            'customerReference' => $customerReference,
            'regulatoryRequirements' => $regulatoryRequirements,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a single requirement group by ID
     *
     * @param string $id ID of the requirement group to retrieve
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update requirement values in requirement group
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
    ): RequirementGroup {
        $params = [
            'customerReference' => $customerReference,
            'regulatoryRequirements' => $regulatoryRequirements,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List requirement groups
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
    ): array {
        $params = ['filter' => $filter];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a requirement group by ID
     *
     * @param string $id ID of the requirement group
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Submit a Requirement Group for Approval
     *
     * @param string $id ID of the requirement group to submit
     *
     * @throws APIException
     */
    public function submitForApproval(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->submitForApproval($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
