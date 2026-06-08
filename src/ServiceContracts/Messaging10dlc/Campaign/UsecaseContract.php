<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc\Campaign;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\Campaign\Usecase\UsecaseGetCostResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UsecaseContract
{
    /**
     * @api
     *
     * @param string $usecase filter results by usecase
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getCost(
        string $usecase,
        RequestOptions|array|null $requestOptions = null
    ): UsecaseGetCostResponse;
}
