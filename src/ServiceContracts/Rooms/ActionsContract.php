<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rooms;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Actions\ActionGenerateJoinClientTokenResponse;
use Telnyx\Rooms\Actions\ActionRefreshClientTokenResponse;

use const Telnyx\Core\OMIT as omit;

interface ActionsContract
{
    /**
     * @api
     *
     * @param int $refreshTokenTtlSecs the time to live in seconds of the Refresh Token, after that time the Refresh Token is invalid and can't be used to refresh Client Token
     * @param int $tokenTtlSecs the time to live in seconds of the Client Token, after that time the Client Token is invalid and can't be used to join a Room
     *
     * @throws APIException
     */
    public function generateJoinClientToken(
        string $roomID,
        $refreshTokenTtlSecs = omit,
        $tokenTtlSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionGenerateJoinClientTokenResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function generateJoinClientTokenRaw(
        string $roomID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionGenerateJoinClientTokenResponse;

    /**
     * @api
     *
     * @param string $refreshToken
     * @param int $tokenTtlSecs the time to live in seconds of the Client Token, after that time the Client Token is invalid and can't be used to join a Room
     *
     * @throws APIException
     */
    public function refreshClientToken(
        string $roomID,
        $refreshToken,
        $tokenTtlSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionRefreshClientTokenResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function refreshClientTokenRaw(
        string $roomID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionRefreshClientTokenResponse;
}
