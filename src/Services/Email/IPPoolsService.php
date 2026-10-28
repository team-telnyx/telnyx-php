<?php

declare(strict_types=1);

namespace Telnyx\Services\Email;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\Email\IPPools\IPPoolListResponse;
use Telnyx\Email\IPPools\IPPoolShowResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Email\IPPoolsContract;
use Telnyx\Services\Email\IPPools\IPsService;

/**
 * Group dedicated IPs into pools for sending.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class IPPoolsService implements IPPoolsContract
{
    /**
     * @api
     */
    public IPPoolsRawService $raw;

    /**
     * @api
     */
    public IPsService $ips;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new IPPoolsRawService($client);
        $this->ips = new IPsService($client);
    }

    /**
     * @api
     *
     * Create an account-scoped pool of dedicated IPs. Set `is_default` or `domain_id` for the pool to carry mail; a pool with neither carries none.
     *
     * @param string $name Pool name: 1-64 characters of lowercase letters, digits, `.`, `_`, and `-`, starting and ending with a letter or digit. Must be unique within the account and must not start with `dip_`.
     * @param string $domainID Scope the pool to one of the account's email domains; the pool then carries that domain's mail. Scope at most one pool to each domain.
     * @param bool $isDefault Make this the account's default pool, which carries mail for sending domains without a domain-scoped pool. An account can have one default pool. Defaults to `false`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        ?string $domainID = null,
        ?bool $isDefault = null,
        RequestOptions|array|null $requestOptions = null,
    ): IPPoolShowResponse {
        $params = array_filter(
            [
                'name' => $name,
                'domainID' => $domainID ?? Omitted::VALUE,
                'isDefault' => $isDefault ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a single IP pool by its identifier, including its dedicated-IP members with billing state.
     *
     * @param string $id the IP pool identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): IPPoolShowResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Rename the pool, set or clear the default flag, or change its domain scope. Routing follows the new settings for subsequent mail.
     *
     * @param string $id the IP pool identifier (UUID)
     * @param string|Omitted|null $domainID scope the pool to one of the account's email domains, or `null` to remove the scope
     * @param bool $isDefault Set or clear the account default flag. An account can have one default pool.
     * @param string $name Pool name: 1-64 characters of lowercase letters, digits, `.`, `_`, and `-`, starting and ending with a letter or digit. Must be unique within the account and must not start with `dip_`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string|Omitted|null $domainID = Omitted::VALUE,
        ?bool $isDefault = null,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): IPPoolShowResponse {
        $params = array_filter(
            [
                'domainID' => $domainID,
                'isDefault' => $isDefault ?? Omitted::VALUE,
                'name' => $name ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List the account's dedicated-IP pools. Member IPs are not included (`ips` is empty); retrieve a pool to see its members.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): IPPoolListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete the pool. Member IPs are kept but leave the pool, so they carry no mail until added to another pool. Deleting a pool changes routing for subsequently resolved messages. It does not reroute messages already assigned to the deleted pool. Deleting a pool that still has IPs requires `force=true` and `drain=true`.
     *
     * @param string $id the IP pool identifier (UUID)
     * @param bool $drain Set together with `force=true` to delete a pool that still has IPs. Acknowledges deletion while the pool still has members; this flag does not reroute already queued messages.
     * @param bool $force Set together with `drain=true` to delete a pool that still has IPs. Either flag alone has no effect.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        bool $drain = false,
        bool $force = false,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = ['drain' => $drain, 'force' => $force];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
