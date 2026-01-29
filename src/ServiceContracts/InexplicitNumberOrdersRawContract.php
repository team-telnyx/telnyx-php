<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPaginationForInexplicitNumberOrders;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderGetResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderListParams;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderNewResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface InexplicitNumberOrdersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|InexplicitNumberOrderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InexplicitNumberOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|InexplicitNumberOrderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Identifies the inexplicit number order
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InexplicitNumberOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|InexplicitNumberOrderListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPaginationForInexplicitNumberOrders<InexplicitNumberOrderResponse,>,>
     *
     * @throws APIException
     */
    public function list(
        array|InexplicitNumberOrderListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
