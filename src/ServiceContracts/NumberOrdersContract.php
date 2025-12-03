<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberOrders\NumberOrderCreateParams;
use Telnyx\NumberOrders\NumberOrderGetResponse;
use Telnyx\NumberOrders\NumberOrderListParams;
use Telnyx\NumberOrders\NumberOrderListResponse;
use Telnyx\NumberOrders\NumberOrderNewResponse;
use Telnyx\NumberOrders\NumberOrderUpdateParams;
use Telnyx\NumberOrders\NumberOrderUpdateResponse;
use Telnyx\RequestOptions;

interface NumberOrdersContract
{
    /**
     * @api
     *
     * @param array<mixed>|NumberOrderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|NumberOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberOrderID,
        ?RequestOptions $requestOptions = null
    ): NumberOrderGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|NumberOrderUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $numberOrderID,
        array|NumberOrderUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|NumberOrderListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|NumberOrderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderListResponse;
}
