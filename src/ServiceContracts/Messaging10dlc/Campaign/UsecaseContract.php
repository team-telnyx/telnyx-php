<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc\Campaign;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\Campaign\Usecase\UsecaseGetCostResponse;
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
