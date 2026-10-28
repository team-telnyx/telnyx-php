<?php

declare(strict_types=1);

namespace Telnyx\Services\Tunnels;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Tunnels\ActionsContract;
use Telnyx\Tunnels\Actions\ActionRotateTokenResponse;

/**
 * Tunnels connect a Network to hosts behind a tunnel process within the user's network.
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
     * Issues a new `tunnel_token` and invalidates the previous one. Tunnel processes already connected stay connected until they reconnect, and are then refused until they use the new token.
     *
     * @param string $id the id of the tunnel
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function rotateToken(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionRotateTokenResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->rotateToken($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
