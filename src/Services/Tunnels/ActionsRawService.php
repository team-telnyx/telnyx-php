<?php

declare(strict_types=1);

namespace Telnyx\Services\Tunnels;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Tunnels\ActionsRawContract;
use Telnyx\Tunnels\Actions\ActionRotateTokenResponse;

/**
 * Tunnels connect a Network to hosts behind a tunnel process within the user's network.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * Issues a new `tunnel_token` and invalidates the previous one. Tunnel processes already connected stay connected until they reconnect, and are then refused until they use the new token.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['tunnels/%1$s/actions/rotate_token', $id],
            options: $requestOptions,
            convert: ActionRotateTokenResponse::class,
        );
    }
}
