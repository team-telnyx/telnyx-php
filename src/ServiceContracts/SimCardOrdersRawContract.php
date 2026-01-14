<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\SimCardOrders\SimCardOrder;
use Telnyx\SimCardOrders\SimCardOrderCreateParams;
use Telnyx\SimCardOrders\SimCardOrderGetResponse;
use Telnyx\SimCardOrders\SimCardOrderListParams;
use Telnyx\SimCardOrders\SimCardOrderNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SimCardOrdersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SimCardOrderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimCardOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SimCardOrderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimCardOrderGetResponse>
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
     * @param array<string,mixed>|SimCardOrderListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<SimCardOrder>>
     *
     * @throws APIException
     */
    public function list(
        array|SimCardOrderListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
