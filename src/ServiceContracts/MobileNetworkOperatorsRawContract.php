<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListResponse;
use Telnyx\RequestOptions;

interface MobileNetworkOperatorsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|MobileNetworkOperatorListParams $params
     *
     * @return BaseResponse<DefaultPagination<MobileNetworkOperatorListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|MobileNetworkOperatorListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
