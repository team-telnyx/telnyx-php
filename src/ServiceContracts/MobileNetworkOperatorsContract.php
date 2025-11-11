<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListResponse;
use Telnyx\RequestOptions;

interface MobileNetworkOperatorsContract
{
    /**
     * @api
     *
     * @param array<mixed>|MobileNetworkOperatorListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|MobileNetworkOperatorListParams $params,
        ?RequestOptions $requestOptions = null,
    ): MobileNetworkOperatorListResponse;
}
