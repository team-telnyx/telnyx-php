<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\OperatorConnect;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\OperatorConnect\Actions\ActionRefreshResponse;
use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     *
     * @return ActionRefreshResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function refresh(
        ?RequestOptions $requestOptions = null
    ): ActionRefreshResponse;

    /**
     * @api
     *
     * @return ActionRefreshResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function refreshRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ActionRefreshResponse;
}
