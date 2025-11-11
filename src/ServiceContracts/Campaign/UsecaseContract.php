<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Campaign;

use Telnyx\Campaign\Usecase\UsecaseGetCostParams;
use Telnyx\Campaign\Usecase\UsecaseGetCostResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface UsecaseContract
{
    /**
     * @api
     *
     * @param array<mixed>|UsecaseGetCostParams $params
     *
     * @throws APIException
     */
    public function getCost(
        array|UsecaseGetCostParams $params,
        ?RequestOptions $requestOptions = null,
    ): UsecaseGetCostResponse;
}
