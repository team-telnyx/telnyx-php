<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SubNumberOrdersRawContract
{
    /**
     * @api
     *
     * @param string $subNumberOrderID the sub number order ID
     * @param array<string,mixed>|SubNumberOrderRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubNumberOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $subNumberOrderID,
        array|SubNumberOrderRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subNumberOrderID the sub number order ID
     * @param array<string,mixed>|SubNumberOrderUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubNumberOrderUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $subNumberOrderID,
        array|SubNumberOrderUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SubNumberOrderListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubNumberOrderListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|SubNumberOrderListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subNumberOrderID the ID of the sub number order
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubNumberOrderCancelResponse>
     *
     * @throws APIException
     */
    public function cancel(
        string $subNumberOrderID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The ID of the sub number order
     * @param array<string,mixed>|SubNumberOrderUpdateRequirementGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubNumberOrderUpdateRequirementGroupResponse>
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $id,
        array|SubNumberOrderUpdateRequirementGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
