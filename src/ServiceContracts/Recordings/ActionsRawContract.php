<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Recordings;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Recordings\Actions\ActionDeleteParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ActionDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        array|ActionDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
