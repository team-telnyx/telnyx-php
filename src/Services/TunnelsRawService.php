<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TunnelsRawContract;
use Telnyx\Tunnels\TunnelCreateParams;
use Telnyx\Tunnels\TunnelGetResponse;
use Telnyx\Tunnels\TunnelListParams;
use Telnyx\Tunnels\TunnelListParams\Filter;
use Telnyx\Tunnels\TunnelListParams\Page;
use Telnyx\Tunnels\TunnelListParams\Sort;
use Telnyx\Tunnels\TunnelListResponse;
use Telnyx\Tunnels\TunnelNewResponse;

/**
 * Tunnels connect a Network to hosts behind a tunnel process within the user's network.
 *
 * @phpstan-import-type FilterShape from \Telnyx\Tunnels\TunnelListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Tunnels\TunnelListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TunnelsRawService implements TunnelsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a tunnel and returns its `tunnel_token`. The token is the only credential the tunnel process needs, and this response and `POST /tunnels/{id}/actions/rotate_token` are the only ones that return it. A new tunnel is `inactive` until a tunnel process connects with the token.
     *
     * @param array{name: string}|TunnelCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TunnelNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TunnelCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TunnelCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'tunnels',
            body: (object) $parsed,
            options: $options,
            convert: TunnelNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a tunnel with its status and the tunnel processes connected to it. The response never includes `tunnel_token`.
     *
     * @param string $id the id of the tunnel
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TunnelGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['tunnels/%1$s', $id],
            options: $requestOptions,
            convert: TunnelGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists the tunnels on the account with their status and connected tunnel processes. Responses never include `tunnel_token`.
     *
     * @param array{
     *   filter?: Filter|FilterShape, page?: Page|PageShape, sort?: value-of<Sort>
     * }|TunnelListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TunnelListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|TunnelListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TunnelListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'tunnels',
            query: $parsed,
            options: $options,
            convert: TunnelListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a tunnel. A tunnel that a route names as its next hop cannot be deleted; delete those routes first. Connected tunnel processes are disconnected and cannot reconnect with the tunnel's token.
     *
     * @param string $id the id of the tunnel
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['tunnels/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
