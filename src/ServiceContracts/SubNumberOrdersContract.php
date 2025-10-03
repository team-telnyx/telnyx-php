<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement;
use Telnyx\RequestOptions;
use Telnyx\SubNumberOrders\SubNumberOrderCancelResponse;
use Telnyx\SubNumberOrders\SubNumberOrderGetResponse;
use Telnyx\SubNumberOrders\SubNumberOrderListResponse;
use Telnyx\SubNumberOrders\SubNumberOrderRetrieveParams\Filter;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateResponse;

use const Telnyx\Core\OMIT as omit;

interface SubNumberOrdersContract
{
    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[include_phone_numbers]
     *
     * @throws APIException
     */
    public function retrieve(
        string $subNumberOrderID,
        $filter = omit,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderGetResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $subNumberOrderID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderGetResponse;

    /**
     * @api
     *
     * @param list<UpdateRegulatoryRequirement> $regulatoryRequirements
     *
     * @throws APIException
     */
    public function update(
        string $subNumberOrderID,
        $regulatoryRequirements = omit,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $subNumberOrderID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderUpdateResponse;

    /**
     * @api
     *
     * @param Telnyx\SubNumberOrders\SubNumberOrderListParams\Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[order_request_id], filter[country_code], filter[phone_number_type], filter[phone_numbers_count]
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrderListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrderListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function cancel(
        string $subNumberOrderID,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrderCancelResponse;

    /**
     * @api
     *
     * @param string $requirementGroupID The ID of the requirement group to associate
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $id,
        $requirementGroupID,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrderUpdateRequirementGroupResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRequirementGroupRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrderUpdateRequirementGroupResponse;
}
