<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberBlockOrders\NumberBlockOrderCreateParams;
use Telnyx\NumberBlockOrders\NumberBlockOrderGetResponse;
use Telnyx\NumberBlockOrders\NumberBlockOrderListParams;
use Telnyx\NumberBlockOrders\NumberBlockOrderListResponse;
use Telnyx\NumberBlockOrders\NumberBlockOrderNewResponse;
use Telnyx\RequestOptions;

interface NumberBlockOrdersContract
{
    /**
     * @api
     *
     * @param array<mixed>|NumberBlockOrderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|NumberBlockOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberBlockOrderNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberBlockOrderID,
        ?RequestOptions $requestOptions = null
    ): NumberBlockOrderGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|NumberBlockOrderListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|NumberBlockOrderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberBlockOrderListResponse;
}
