<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberGetResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListParams\Filter;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementsResponse;
use Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListParams\Filter
 * @phpstan-import-type UpdateRegulatoryRequirementShape from \Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NumberOrderPhoneNumbersContract
{
    /**
     * @api
     *
     * @param string $numberOrderPhoneNumberID the number order phone number ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberOrderPhoneNumberID,
        RequestOptions|array|null $requestOptions = null,
    ): NumberOrderPhoneNumberGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[country_code]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): NumberOrderPhoneNumberListResponse;

    /**
     * @api
     *
     * @param string $id The unique identifier of the number order phone number
     * @param string $requirementGroupID The ID of the requirement group to associate
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $id,
        string $requirementGroupID,
        RequestOptions|array|null $requestOptions = null,
    ): NumberOrderPhoneNumberUpdateRequirementGroupResponse;

    /**
     * @api
     *
     * @param string $numberOrderPhoneNumberID the number order phone number ID
     * @param list<UpdateRegulatoryRequirement|UpdateRegulatoryRequirementShape> $regulatoryRequirements
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateRequirements(
        string $numberOrderPhoneNumberID,
        ?array $regulatoryRequirements = null,
        RequestOptions|array|null $requestOptions = null,
    ): NumberOrderPhoneNumberUpdateRequirementsResponse;
}
