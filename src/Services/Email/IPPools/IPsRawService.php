<?php

declare(strict_types=1);

namespace Telnyx\Services\Email\IPPools;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Email\IPPools\IPs\IPCreateParams;
use Telnyx\Email\IPPools\IPs\IPDeleteParams;
use Telnyx\Email\IPPools\IPs\IPNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Email\IPPools\IPsRawContract;

/**
 * Group dedicated IPs into pools for sending.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class IPsRawService implements IPsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Add a dedicated IP to the pool with an optional routing weight. An IP can belong to one pool; to move an IP that is already in a pool, use `PATCH /email/dedicated_ips/{id}` with `pool_id`.
     *
     * @param string $id the IP pool identifier (UUID)
     * @param array{dedicatedIPID: string, weight?: int}|IPCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IPNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|IPCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IPCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['email/ip_pools/%1$s/ips', $id],
            body: (object) $parsed,
            options: $options,
            convert: IPNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Remove the dedicated IP from the pool. The IP is kept but carries no mail until added to a pool again. Removing the last IP requires `force=true` and `drain=true`.
     *
     * @param string $ipID path param: The dedicated IP identifier (UUID)
     * @param array{id: string, drain?: bool, force?: bool}|IPDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $ipID,
        array|IPDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IPDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['email/ip_pools/%1$s/ips/%2$s', $id, $ipID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }
}
