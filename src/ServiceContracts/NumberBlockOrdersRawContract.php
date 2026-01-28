<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\NumberBlockOrders\NumberBlockOrder;
use Telnyx\NumberBlockOrders\NumberBlockOrderCreateParams;
use Telnyx\NumberBlockOrders\NumberBlockOrderGetResponse;
use Telnyx\NumberBlockOrders\NumberBlockOrderListParams;
use Telnyx\NumberBlockOrders\NumberBlockOrderNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NumberBlockOrdersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|NumberBlockOrderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberBlockOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NumberBlockOrderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $numberBlockOrderID the number block order ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberBlockOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberBlockOrderID,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|NumberBlockOrderListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<NumberBlockOrder>>
     *
     * @throws APIException
     */
    public function list(
        array|NumberBlockOrderListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
