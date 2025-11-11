<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rooms;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Actions\ActionGenerateJoinClientTokenParams;
use Telnyx\Rooms\Actions\ActionGenerateJoinClientTokenResponse;
use Telnyx\Rooms\Actions\ActionRefreshClientTokenParams;
use Telnyx\Rooms\Actions\ActionRefreshClientTokenResponse;

interface ActionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ActionGenerateJoinClientTokenParams $params
     *
     * @throws APIException
     */
    public function generateJoinClientToken(
        string $roomID,
        array|ActionGenerateJoinClientTokenParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionGenerateJoinClientTokenResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionRefreshClientTokenParams $params
     *
     * @throws APIException
     */
    public function refreshClientToken(
        string $roomID,
        array|ActionRefreshClientTokenParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionRefreshClientTokenResponse;
}
