<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TailscaleSubnetRoutersRawContract;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouter;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterCreateParams;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterDeleteResponse;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterGetResponse;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterListParams;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterListParams\Filter;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterNewResponse;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterUpdateParams;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterUpdateResponse;

/**
 * Tailscale Subnet Router operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TailscaleSubnetRoutersRawService implements TailscaleSubnetRoutersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a Tailscale Subnet Router on a Network and enrolls it in the user's tailnet with the auth key. The response returns the router with `status` `provisioning`. Poll `GET /tailscale_subnet_routers/{id}` until it is `provisioned`. Then approve its routes in the tailnet, unless an auto-approver covers them.
     *
     * @param array{
     *   advertisedRoutes: list<string>,
     *   authKey: string,
     *   name: string,
     *   networkID: string,
     *   regionCode: string,
     * }|TailscaleSubnetRouterCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TailscaleSubnetRouterNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TailscaleSubnetRouterCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TailscaleSubnetRouterCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'tailscale_subnet_routers',
            body: (object) $parsed,
            options: $options,
            convert: TailscaleSubnetRouterNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the details of a single Tailscale Subnet Router by its identifier, including its enrollment state.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TailscaleSubnetRouterGetResponse>
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
            path: ['tailscale_subnet_routers/%1$s', $id],
            options: $requestOptions,
            convert: TailscaleSubnetRouterGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Renames the router, changes its advertised routes, or retries a failed enrollment. Any change queues a new provisioning run and returns the router with `status` `provisioning`. The router keeps its machine identity on the tailnet. Send an empty object to retry a `failed` router with its stored auth key. Include a new `auth_key` only while the router has never enrolled. The router's Network and region cannot change: create a new router instead.
     *
     * @param string $id identifies the resource
     * @param array{
     *   advertisedRoutes?: list<string>, authKey?: string, name?: string
     * }|TailscaleSubnetRouterUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TailscaleSubnetRouterUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TailscaleSubnetRouterUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TailscaleSubnetRouterUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['tailscale_subnet_routers/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: TailscaleSubnetRouterUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a paginated list of the Tailscale Subnet Routers on the account, with support for filtering by Network.
     *
     * @param array{
     *   filter?: Filter|FilterShape, pageNumber?: int, pageSize?: int
     * }|TailscaleSubnetRouterListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<TailscaleSubnetRouter>>
     *
     * @throws APIException
     */
    public function list(
        array|TailscaleSubnetRouterListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TailscaleSubnetRouterListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'tailscale_subnet_routers',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: TailscaleSubnetRouter::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Removes the router from the Network and logs it out of the tailnet. The response returns the router with `status` `deleting`. The record disappears once removal completes. A machine entry can remain in the tailnet's admin console until it is removed there.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TailscaleSubnetRouterDeleteResponse>
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
            path: ['tailscale_subnet_routers/%1$s', $id],
            options: $requestOptions,
            convert: TailscaleSubnetRouterDeleteResponse::class,
        );
    }
}
