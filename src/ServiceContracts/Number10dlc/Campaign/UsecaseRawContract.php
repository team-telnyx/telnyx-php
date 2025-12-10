<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc\Campaign;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\Campaign\Usecase\UsecaseGetCostResponse;
use Telnyx\Number10dlc\Campaign\Usecase\UsecaseRetrieveCostParams;
use Telnyx\RequestOptions;

interface UsecaseRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|UsecaseRetrieveCostParams $params
     *
     * @return BaseResponse<UsecaseGetCostResponse>
     *
     * @throws APIException
     */
    public function retrieveCost(
        array|UsecaseRetrieveCostParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
