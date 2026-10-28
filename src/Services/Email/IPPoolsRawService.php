<?php

declare(strict_types=1);

namespace Telnyx\Services\Email;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Email\IPPools\IPPoolCreateParams;
use Telnyx\Email\IPPools\IPPoolDeleteParams;
use Telnyx\Email\IPPools\IPPoolListResponse;
use Telnyx\Email\IPPools\IPPoolShowResponse;
use Telnyx\Email\IPPools\IPPoolUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Email\IPPoolsRawContract;

/**
 * Group dedicated IPs into pools for sending.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class IPPoolsRawService implements IPPoolsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create an account-scoped pool of dedicated IPs. Set `is_default` or `domain_id` for the pool to carry mail; a pool with neither carries none.
     *
     * @param array{
     *   name: string, domainID?: string, isDefault?: bool
     * }|IPPoolCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IPPoolShowResponse>
     *
     * @throws APIException
     */
    public function create(
        array|IPPoolCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IPPoolCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'email/ip_pools',
            body: (object) $parsed,
            options: $options,
            convert: IPPoolShowResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a single IP pool by its identifier, including its dedicated-IP members with billing state.
     *
     * @param string $id the IP pool identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IPPoolShowResponse>
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
            path: ['email/ip_pools/%1$s', $id],
            options: $requestOptions,
            convert: IPPoolShowResponse::class,
        );
    }

    /**
     * @api
     *
     * Rename the pool, set or clear the default flag, or change its domain scope. Routing follows the new settings for subsequent mail.
     *
     * @param string $id the IP pool identifier (UUID)
     * @param array{
     *   domainID?: string|null, isDefault?: bool, name?: string
     * }|IPPoolUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IPPoolShowResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|IPPoolUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IPPoolUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['email/ip_pools/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: IPPoolShowResponse::class,
        );
    }

    /**
     * @api
     *
     * List the account's dedicated-IP pools. Member IPs are not included (`ips` is empty); retrieve a pool to see its members.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IPPoolListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'email/ip_pools',
            options: $requestOptions,
            convert: IPPoolListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete the pool. Member IPs are kept but leave the pool, so they carry no mail until added to another pool. Deleting a pool changes routing for subsequently resolved messages. It does not reroute messages already assigned to the deleted pool. Deleting a pool that still has IPs requires `force=true` and `drain=true`.
     *
     * @param string $id the IP pool identifier (UUID)
     * @param array{drain?: bool, force?: bool}|IPPoolDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|IPPoolDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IPPoolDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['email/ip_pools/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }
}
