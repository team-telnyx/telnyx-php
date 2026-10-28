<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Tunnels;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Tunnels\Actions\ActionRotateTokenResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param string $id the id of the tunnel
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function rotateToken(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionRotateTokenResponse;
}
