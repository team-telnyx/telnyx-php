<?php

declare(strict_types=1);

namespace Telnyx\Services\Rooms;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Actions\ActionGenerateJoinClientTokenParams;
use Telnyx\Rooms\Actions\ActionGenerateJoinClientTokenResponse;
use Telnyx\Rooms\Actions\ActionRefreshClientTokenParams;
use Telnyx\Rooms\Actions\ActionRefreshClientTokenResponse;
use Telnyx\ServiceContracts\Rooms\ActionsContract;

use const Telnyx\Core\OMIT as omit;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Synchronously create an Client Token to join a Room. Client Token is necessary to join a Telnyx Room. Client Token will expire after `token_ttl_secs`, a Refresh Token is also provided to refresh a Client Token, the Refresh Token expires after `refresh_token_ttl_secs`.
     *
     * @param int $refreshTokenTtlSecs the time to live in seconds of the Refresh Token, after that time the Refresh Token is invalid and can't be used to refresh Client Token
     * @param int $tokenTtlSecs the time to live in seconds of the Client Token, after that time the Client Token is invalid and can't be used to join a Room
     *
     * @return ActionGenerateJoinClientTokenResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function generateJoinClientToken(
        string $roomID,
        $refreshTokenTtlSecs = omit,
        $tokenTtlSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionGenerateJoinClientTokenResponse {
        $params = [
            'refreshTokenTtlSecs' => $refreshTokenTtlSecs,
            'tokenTtlSecs' => $tokenTtlSecs,
        ];

        return $this->generateJoinClientTokenRaw($roomID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionGenerateJoinClientTokenResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function generateJoinClientTokenRaw(
        string $roomID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionGenerateJoinClientTokenResponse {
        [$parsed, $options] = ActionGenerateJoinClientTokenParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['rooms/%1$s/actions/generate_join_client_token', $roomID],
            body: (object) $parsed,
            options: $options,
            convert: ActionGenerateJoinClientTokenResponse::class,
        );
    }

    /**
     * @api
     *
     * Synchronously refresh an Client Token to join a Room. Client Token is necessary to join a Telnyx Room. Client Token will expire after `token_ttl_secs`.
     *
     * @param string $refreshToken
     * @param int $tokenTtlSecs the time to live in seconds of the Client Token, after that time the Client Token is invalid and can't be used to join a Room
     *
     * @return ActionRefreshClientTokenResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function refreshClientToken(
        string $roomID,
        $refreshToken,
        $tokenTtlSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionRefreshClientTokenResponse {
        $params = [
            'refreshToken' => $refreshToken, 'tokenTtlSecs' => $tokenTtlSecs,
        ];

        return $this->refreshClientTokenRaw($roomID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionRefreshClientTokenResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function refreshClientTokenRaw(
        string $roomID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionRefreshClientTokenResponse {
        [$parsed, $options] = ActionRefreshClientTokenParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['rooms/%1$s/actions/refresh_client_token', $roomID],
            body: (object) $parsed,
            options: $options,
            convert: ActionRefreshClientTokenResponse::class,
        );
    }
}
