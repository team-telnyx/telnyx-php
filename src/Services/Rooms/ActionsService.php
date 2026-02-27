<?php

declare(strict_types=1);

namespace Telnyx\Services\Rooms;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Actions\ActionGenerateJoinClientTokenResponse;
use Telnyx\Rooms\Actions\ActionRefreshClientTokenResponse;
use Telnyx\ServiceContracts\Rooms\ActionsContract;

/**
 * Rooms Client Tokens operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * Synchronously create an Client Token to join a Room. Client Token is necessary to join a Telnyx Room. Client Token will expire after `token_ttl_secs`, a Refresh Token is also provided to refresh a Client Token, the Refresh Token expires after `refresh_token_ttl_secs`.
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
    ): ActionGenerateJoinClientTokenResponse {
        $params = Util::removeNulls(
            [
                'refreshTokenTtlSecs' => $refreshTokenTtlSecs,
                'tokenTtlSecs' => $tokenTtlSecs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->generateJoinClientToken($roomID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Synchronously refresh an Client Token to join a Room. Client Token is necessary to join a Telnyx Room. Client Token will expire after `token_ttl_secs`.
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
    ): ActionRefreshClientTokenResponse {
        $params = Util::removeNulls(
            ['refreshToken' => $refreshToken, 'tokenTtlSecs' => $tokenTtlSecs]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->refreshClientToken($roomID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
