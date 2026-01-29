<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\OperatorConnect;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\OperatorConnect\Actions\ActionRefreshResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionRefreshResponse>
     *
     * @throws APIException
     */
    public function refresh(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
