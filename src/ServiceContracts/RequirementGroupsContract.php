<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     *
     * @return RequirementGroup<HasRawResponse>
     *
     * @throws APIException
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
     *
     * @param array<string, mixed> $params
     *
     * @return RequirementGroup<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup;

    /**
     * @api
     *
     * @return RequirementGroup<HasRawResponse>
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
     * @return RequirementGroup<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup;

    /**
     * @api
     *
     * @param string $customerReference Reference for the customer
     * @param list<RegulatoryRequirement1> $regulatoryRequirements
     *
     * @return RequirementGroup<HasRawResponse>
     *
     * @throws APIException
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
     * @param array<string, mixed> $params
     *
     * @return RequirementGroup<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action], filter[status], filter[customer_reference]
     *
     * @return list<RequirementGroup>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return list<RequirementGroup>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @return RequirementGroup<HasRawResponse>
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
     * @return RequirementGroup<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup;

    /**
     * @api
     *
     * @return RequirementGroup<HasRawResponse>
     *
     * @throws APIException
     */
    public function submitForApproval(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup;

    /**
     * @api
     *
     * @return RequirementGroup<HasRawResponse>
     *
     * @throws APIException
     */
    public function submitForApprovalRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup;
}
