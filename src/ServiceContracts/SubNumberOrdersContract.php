<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement;
use Telnyx\RequestOptions;
use Telnyx\SubNumberOrders\SubNumberOrderCancelResponse;
use Telnyx\SubNumberOrders\SubNumberOrderGetResponse;
use Telnyx\SubNumberOrders\SubNumberOrderListParams\Filter as Filter1;
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
     * @return SubNumberOrderGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $subNumberOrderID,
        $filter = omit,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderGetResponse;

    /**
     * @api
     *
     * @param list<UpdateRegulatoryRequirement> $regulatoryRequirements
     *
     * @return SubNumberOrderUpdateResponse<HasRawResponse>
     */
    public function update(
        string $subNumberOrderID,
        $regulatoryRequirements = omit,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderUpdateResponse;

    /**
     * @api
     *
     * @param Filter1 $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[order_request_id], filter[country_code], filter[phone_number_type], filter[phone_numbers_count]
     *
     * @return SubNumberOrderListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrderListResponse;

    /**
     * @api
     *
     * @return SubNumberOrderCancelResponse<HasRawResponse>
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
     * @return SubNumberOrderUpdateRequirementGroupResponse<HasRawResponse>
     */
    public function updateRequirementGroup(
        string $id,
        $requirementGroupID,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrderUpdateRequirementGroupResponse;
}
