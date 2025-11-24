<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderCreateParams;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderGetResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderListParams;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderListResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderNewResponse;
use Telnyx\RequestOptions;

interface InexplicitNumberOrdersContract
{
    /**
     * @api
     *
     * @param array<mixed>|InexplicitNumberOrderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|InexplicitNumberOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): InexplicitNumberOrderNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): InexplicitNumberOrderGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|InexplicitNumberOrderListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|InexplicitNumberOrderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): InexplicitNumberOrderListResponse;
}
