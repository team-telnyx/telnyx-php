<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AdvancedOrders\AdvancedOrderCreateParams;
use Telnyx\AdvancedOrders\AdvancedOrderGetResponse;
use Telnyx\AdvancedOrders\AdvancedOrderListResponse;
use Telnyx\AdvancedOrders\AdvancedOrderNewResponse;
use Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams;
use Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface AdvancedOrdersContract
{
    /**
     * @api
     *
     * @param array<mixed>|AdvancedOrderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|AdvancedOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AdvancedOrderNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): AdvancedOrderGetResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): AdvancedOrderListResponse;

    /**
     * @api
     *
     * @param array<mixed>|AdvancedOrderUpdateRequirementGroupParams $params
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $advancedOrderID,
        array|AdvancedOrderUpdateRequirementGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): AdvancedOrderUpdateRequirementGroupResponse;
}
