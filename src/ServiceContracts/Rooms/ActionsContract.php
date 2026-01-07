<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rooms;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Actions\ActionGenerateJoinClientTokenResponse;
use Telnyx\Rooms\Actions\ActionRefreshClientTokenResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param string $roomID the unique identifier of a room
     * @param int $refreshTokenTtlSecs the time to live in seconds of the Refresh Token, after that time the Refresh Token is invalid and can't be used to refresh Client Token
     * @param int $tokenTtlSecs the time to live in seconds of the Client Token, after that time the Client Token is invalid and can't be used to join a Room
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function generateJoinClientToken(
        string $roomID,
        int $refreshTokenTtlSecs = 3600,
        int $tokenTtlSecs = 600,
        RequestOptions|array|null $requestOptions = null,
    ): ActionGenerateJoinClientTokenResponse;

    /**
     * @api
     *
     * @param string $roomID the unique identifier of a room
     * @param int $tokenTtlSecs the time to live in seconds of the Client Token, after that time the Client Token is invalid and can't be used to join a Room
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function refreshClientToken(
        string $roomID,
        string $refreshToken,
        int $tokenTtlSecs = 600,
        RequestOptions|array|null $requestOptions = null,
    ): ActionRefreshClientTokenResponse;
}
