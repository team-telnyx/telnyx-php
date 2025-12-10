<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc\Campaign;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\Campaign\Usecase\UsecaseGetCostResponse;
use Telnyx\RequestOptions;

interface UsecaseContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveCost(
        string $usecase,
        ?RequestOptions $requestOptions = null
    ): UsecaseGetCostResponse;
}
