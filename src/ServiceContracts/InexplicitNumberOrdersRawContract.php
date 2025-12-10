<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderGetResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderListParams;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderListResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderNewResponse;
use Telnyx\RequestOptions;

interface InexplicitNumberOrdersRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|InexplicitNumberOrderCreateParams $params
     *
     * @return BaseResponse<InexplicitNumberOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|InexplicitNumberOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Identifies the inexplicit number order
     *
     * @return BaseResponse<InexplicitNumberOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|InexplicitNumberOrderListParams $params
     *
     * @return BaseResponse<InexplicitNumberOrderListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|InexplicitNumberOrderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
