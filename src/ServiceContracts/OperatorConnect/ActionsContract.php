<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\OperatorConnect;

use Telnyx\OperatorConnect\Actions\ActionRefreshResponse;
use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     */
    public function refresh(
        ?RequestOptions $requestOptions = null
    ): ActionRefreshResponse;
}
