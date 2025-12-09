<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Campaign;

use Telnyx\Campaign\Usecase\UsecaseGetCostResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface UsecaseContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function getCost(
        string $usecase,
        ?RequestOptions $requestOptions = null
    ): UsecaseGetCostResponse;
}
