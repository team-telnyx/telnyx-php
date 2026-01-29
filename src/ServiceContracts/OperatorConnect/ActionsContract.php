<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\OperatorConnect;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\OperatorConnect\Actions\ActionRefreshResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function refresh(
        RequestOptions|array|null $requestOptions = null
    ): ActionRefreshResponse;
}
