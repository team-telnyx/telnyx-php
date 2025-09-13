<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Campaign;

use Telnyx\Campaign\Usecase\UsecaseGetCostResponse;
use Telnyx\Core\Exceptions\APIException;
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
     *
     * @throws APIException
     */
    public function getCost(
        $usecase,
        ?RequestOptions $requestOptions = null
    ): UsecaseGetCostResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return UsecaseGetCostResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getCostRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): UsecaseGetCostResponse;
}
