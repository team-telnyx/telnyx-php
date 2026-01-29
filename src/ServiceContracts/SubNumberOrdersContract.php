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

/**
 * @phpstan-import-type FilterShape from \Telnyx\SubNumberOrders\SubNumberOrderRetrieveParams\Filter
 * @phpstan-import-type UpdateRegulatoryRequirementShape from \Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement
 * @phpstan-import-type FilterShape from \Telnyx\SubNumberOrders\SubNumberOrderListParams\Filter as FilterShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SubNumberOrdersContract
{
    /**
     * @api
     *
     * @param string $subNumberOrderID the sub number order ID
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[include_phone_numbers]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $subNumberOrderID,
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): SubNumberOrderGetResponse;

    /**
     * @api
     *
     * @param string $subNumberOrderID the sub number order ID
     * @param list<UpdateRegulatoryRequirement|UpdateRegulatoryRequirementShape> $regulatoryRequirements
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $subNumberOrderID,
        ?array $regulatoryRequirements = null,
        RequestOptions|array|null $requestOptions = null,
    ): SubNumberOrderUpdateResponse;

    /**
     * @api
     *
     * @param \Telnyx\SubNumberOrders\SubNumberOrderListParams\Filter|FilterShape1 $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[order_request_id], filter[country_code], filter[phone_number_type], filter[phone_numbers_count]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        \Telnyx\SubNumberOrders\SubNumberOrderListParams\Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): SubNumberOrderListResponse;

    /**
     * @api
     *
     * @param string $subNumberOrderID the ID of the sub number order
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cancel(
        string $subNumberOrderID,
        RequestOptions|array|null $requestOptions = null
    ): SubNumberOrderCancelResponse;

    /**
     * @api
     *
     * @param string $id The ID of the sub number order
     * @param string $requirementGroupID The ID of the requirement group to associate
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $id,
        string $requirementGroupID,
        RequestOptions|array|null $requestOptions = null,
    ): SubNumberOrderUpdateRequirementGroupResponse;
}
