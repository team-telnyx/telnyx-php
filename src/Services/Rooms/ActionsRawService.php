<?php

declare(strict_types=1);

namespace Telnyx\Services\Rooms;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Actions\ActionGenerateJoinClientTokenParams;
use Telnyx\Rooms\Actions\ActionGenerateJoinClientTokenResponse;
use Telnyx\Rooms\Actions\ActionRefreshClientTokenParams;
use Telnyx\Rooms\Actions\ActionRefreshClientTokenResponse;
use Telnyx\ServiceContracts\Rooms\ActionsRawContract;

final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Synchronously create an Client Token to join a Room. Client Token is necessary to join a Telnyx Room. Client Token will expire after `token_ttl_secs`, a Refresh Token is also provided to refresh a Client Token, the Refresh Token expires after `refresh_token_ttl_secs`.
     *
     * @param string $roomID the unique identifier of a room
     * @param array{
     *   refreshTokenTtlSecs?: int, tokenTtlSecs?: int
     * }|ActionGenerateJoinClientTokenParams $params
     *
     * @return BaseResponse<ActionGenerateJoinClientTokenResponse>
     *
     * @throws APIException
     */
    public function generateJoinClientToken(
        string $roomID,
        array|ActionGenerateJoinClientTokenParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionGenerateJoinClientTokenParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $roomID the unique identifier of a room
     * @param array{
     *   refreshToken: string, tokenTtlSecs?: int
     * }|ActionRefreshClientTokenParams $params
     *
     * @return BaseResponse<ActionRefreshClientTokenResponse>
     *
     * @throws APIException
     */
    public function refreshClientToken(
        string $roomID,
        array|ActionRefreshClientTokenParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionRefreshClientTokenParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['rooms/%1$s/actions/refresh_client_token', $roomID],
            body: (object) $parsed,
            options: $options,
            convert: ActionRefreshClientTokenResponse::class,
        );
    }
}
