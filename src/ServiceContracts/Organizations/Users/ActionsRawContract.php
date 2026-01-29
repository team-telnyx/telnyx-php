<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Organizations\Users;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Organizations\Users\Actions\ActionRemoveResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $id Organization User ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
