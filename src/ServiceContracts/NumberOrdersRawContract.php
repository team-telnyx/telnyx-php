<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\NumberOrders\NumberOrderCreateParams;
use Telnyx\NumberOrders\NumberOrderGetResponse;
use Telnyx\NumberOrders\NumberOrderListParams;
use Telnyx\NumberOrders\NumberOrderListResponse;
use Telnyx\NumberOrders\NumberOrderNewResponse;
use Telnyx\NumberOrders\NumberOrderUpdateParams;
use Telnyx\NumberOrders\NumberOrderUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NumberOrdersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|NumberOrderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NumberOrderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $numberOrderID the number order ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberOrderID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $numberOrderID the number order ID
     * @param array<string,mixed>|NumberOrderUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberOrderUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $numberOrderID,
        array|NumberOrderUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|NumberOrderListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<NumberOrderListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|NumberOrderListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
