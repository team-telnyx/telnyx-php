<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\OperatorConnect;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\OperatorConnect\Actions\ActionRefreshResponse;
use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function refresh(
        ?RequestOptions $requestOptions = null
    ): ActionRefreshResponse;
}
