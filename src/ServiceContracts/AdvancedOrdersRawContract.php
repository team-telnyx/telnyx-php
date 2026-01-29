<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AdvancedOrders\AdvancedOrderCreateParams;
use Telnyx\AdvancedOrders\AdvancedOrderGetResponse;
use Telnyx\AdvancedOrders\AdvancedOrderListResponse;
use Telnyx\AdvancedOrders\AdvancedOrderNewResponse;
use Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams;
use Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AdvancedOrdersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AdvancedOrderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AdvancedOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AdvancedOrderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AdvancedOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AdvancedOrderListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|AdvancedOrderUpdateRequirementGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AdvancedOrderUpdateRequirementGroupResponse>
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $advancedOrderID,
        array|AdvancedOrderUpdateRequirementGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
