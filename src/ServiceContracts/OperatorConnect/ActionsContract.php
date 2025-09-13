<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\OperatorConnect;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\OperatorConnect\Actions\ActionRefreshResponse;
use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     *
     * @return ActionRefreshResponse<HasRawResponse>
     */
    public function refresh(
        ?RequestOptions $requestOptions = null
    ): ActionRefreshResponse;
}
