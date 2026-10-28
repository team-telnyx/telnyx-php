<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Tunnels;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Tunnels\Actions\ActionRotateTokenResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $id the id of the tunnel
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionRotateTokenResponse>
     *
     * @throws APIException
     */
    public function rotateToken(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
