<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberBlockOrders\NumberBlockOrderCreateParams;
use Telnyx\NumberBlockOrders\NumberBlockOrderGetResponse;
use Telnyx\NumberBlockOrders\NumberBlockOrderListParams;
use Telnyx\NumberBlockOrders\NumberBlockOrderListResponse;
use Telnyx\NumberBlockOrders\NumberBlockOrderNewResponse;
use Telnyx\RequestOptions;

interface NumberBlockOrdersRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|NumberBlockOrderCreateParams $params
     *
     * @return BaseResponse<NumberBlockOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NumberBlockOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $numberBlockOrderID the number block order ID
     *
     * @return BaseResponse<NumberBlockOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberBlockOrderID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|NumberBlockOrderListParams $params
     *
     * @return BaseResponse<NumberBlockOrderListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|NumberBlockOrderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
