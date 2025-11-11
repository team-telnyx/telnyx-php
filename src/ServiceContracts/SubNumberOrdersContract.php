<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SubNumberOrders\SubNumberOrderCancelResponse;
use Telnyx\SubNumberOrders\SubNumberOrderGetResponse;
use Telnyx\SubNumberOrders\SubNumberOrderListParams;
use Telnyx\SubNumberOrders\SubNumberOrderListResponse;
use Telnyx\SubNumberOrders\SubNumberOrderRetrieveParams;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateParams;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupParams;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateResponse;

interface SubNumberOrdersContract
{
    /**
     * @api
     *
     * @param array<mixed>|SubNumberOrderRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $subNumberOrderID,
        array|SubNumberOrderRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|SubNumberOrderUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $subNumberOrderID,
        array|SubNumberOrderUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|SubNumberOrderListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|SubNumberOrderListParams $params,
        ?RequestOptions $requestOptions = null,
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
     * @param array<mixed>|SubNumberOrderUpdateRequirementGroupParams $params
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $id,
        array|SubNumberOrderUpdateRequirementGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrderUpdateRequirementGroupResponse;
}
