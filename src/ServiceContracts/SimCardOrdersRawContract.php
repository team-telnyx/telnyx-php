<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\SimCardOrders\SimCardOrder;
use Telnyx\SimCardOrders\SimCardOrderCreateParams;
use Telnyx\SimCardOrders\SimCardOrderGetResponse;
use Telnyx\SimCardOrders\SimCardOrderListParams;
use Telnyx\SimCardOrders\SimCardOrderNewResponse;

interface SimCardOrdersRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|SimCardOrderCreateParams $params
     *
     * @return BaseResponse<SimCardOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SimCardOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<SimCardOrderGetResponse>
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
     * @param array<mixed>|SimCardOrderListParams $params
     *
     * @return BaseResponse<DefaultPagination<SimCardOrder>>
     *
     * @throws APIException
     */
    public function list(
        array|SimCardOrderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
