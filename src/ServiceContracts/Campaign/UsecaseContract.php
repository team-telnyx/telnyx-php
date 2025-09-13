<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Campaign;

use Telnyx\Campaign\Usecase\UsecaseGetCostResponse;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

interface UsecaseContract
{
    /**
     * @api
     *
     * @param string $usecase
     *
     * @return UsecaseGetCostResponse<HasRawResponse>
     */
    public function getCost(
        $usecase,
        ?RequestOptions $requestOptions = null
    ): UsecaseGetCostResponse;
}
