<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc\Campaign;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\Campaign\Usecase\UsecaseGetCostParams;
use Telnyx\Number10dlc\Campaign\Usecase\UsecaseGetCostResponse;
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
