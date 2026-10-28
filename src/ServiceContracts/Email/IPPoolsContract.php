<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Email;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\Email\IPPools\IPPoolListResponse;
use Telnyx\Email\IPPools\IPPoolShowResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface IPPoolsContract
{
    /**
     * @api
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
    ): IPPoolShowResponse;

    /**
     * @api
     *
     * @param string $id the IP pool identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): IPPoolShowResponse;

    /**
     * @api
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
    ): IPPoolShowResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): IPPoolListResponse;

    /**
     * @api
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
    ): mixed;
}
