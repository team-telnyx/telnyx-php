<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SimCardOrders\SimCardOrderCreateParams;
use Telnyx\SimCardOrders\SimCardOrderGetResponse;
use Telnyx\SimCardOrders\SimCardOrderListParams;
use Telnyx\SimCardOrders\SimCardOrderListResponse;
use Telnyx\SimCardOrders\SimCardOrderNewResponse;

interface SimCardOrdersContract
{
    /**
     * @api
     *
     * @param array<mixed>|SimCardOrderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|SimCardOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardOrderNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SimCardOrderGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|SimCardOrderListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|SimCardOrderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimCardOrderListResponse;
}
