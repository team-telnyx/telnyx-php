<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Campaign;

use Telnyx\Campaign\Usecase\UsecaseGetCostResponse;
use Telnyx\RequestOptions;

interface UsecaseContract
{
    /**
     * @api
     *
     * @param string $usecase
     */
    public function getCost(
        $usecase,
        ?RequestOptions $requestOptions = null
    ): UsecaseGetCostResponse;
}
