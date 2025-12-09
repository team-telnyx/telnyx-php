<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Campaign;

use Telnyx\Campaign\Usecase\UsecaseGetCostParams;
use Telnyx\Campaign\Usecase\UsecaseGetCostResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface UsecaseRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|UsecaseGetCostParams $params
     *
     * @return BaseResponse<UsecaseGetCostResponse>
     *
     * @throws APIException
     */
    public function getCost(
        array|UsecaseGetCostParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
