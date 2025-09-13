<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rooms;

use Telnyx\Core\Implementation\HasRawResponse;
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
     * @return ActionGenerateJoinClientTokenResponse<HasRawResponse>
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
     * @param string $refreshToken
     * @param int $tokenTtlSecs the time to live in seconds of the Client Token, after that time the Client Token is invalid and can't be used to join a Room
     *
     * @return ActionRefreshClientTokenResponse<HasRawResponse>
     */
    public function refreshClientToken(
        string $roomID,
        $refreshToken,
        $tokenTtlSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionRefreshClientTokenResponse;
}
