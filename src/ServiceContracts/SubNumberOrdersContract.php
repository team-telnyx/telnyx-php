<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SubNumberOrders\SubNumberOrderCancelResponse;
use Telnyx\SubNumberOrders\SubNumberOrderGetResponse;
use Telnyx\SubNumberOrders\SubNumberOrderListResponse;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateResponse;

interface SubNumberOrdersContract
{
    /**
     * @api
     *
     * @param string $subNumberOrderID the sub number order ID
     * @param array{
     *   includePhoneNumbers?: bool
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[include_phone_numbers]
     *
     * @throws APIException
     */
    public function retrieve(
        string $subNumberOrderID,
        ?array $filter = null,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderGetResponse;

    /**
     * @api
     *
     * @param string $subNumberOrderID the sub number order ID
     * @param list<array{
     *   fieldValue?: string, requirementID?: string
     * }> $regulatoryRequirements
     *
     * @throws APIException
     */
    public function update(
        string $subNumberOrderID,
        ?array $regulatoryRequirements = null,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderUpdateResponse;

    /**
     * @api
     *
     * @param array{
     *   countryCode?: string,
     *   orderRequestID?: string,
     *   phoneNumberType?: string,
     *   phoneNumbersCount?: int,
     *   status?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[order_request_id], filter[country_code], filter[phone_number_type], filter[phone_numbers_count]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrderListResponse;

    /**
     * @api
     *
     * @param string $subNumberOrderID the ID of the sub number order
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
     * @param string $id The ID of the sub number order
     * @param string $requirementGroupID The ID of the requirement group to associate
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $id,
        string $requirementGroupID,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderUpdateRequirementGroupResponse;
}
