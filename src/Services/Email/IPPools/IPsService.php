<?php

declare(strict_types=1);

namespace Telnyx\Services\Email\IPPools;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\Email\IPPools\IPs\IPNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Email\IPPools\IPsContract;

/**
 * Group dedicated IPs into pools for sending.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class IPsService implements IPsContract
{
    /**
     * @api
     */
    public IPsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new IPsRawService($client);
    }

    /**
     * @api
     *
     * Add a dedicated IP to the pool with an optional routing weight. An IP can belong to one pool; to move an IP that is already in a pool, use `PATCH /email/dedicated_ips/{id}` with `pool_id`.
     *
     * @param string $id the IP pool identifier (UUID)
     * @param string $dedicatedIPID The dedicated IP to add. It must belong to the account, must not be released, and must not already be in a pool.
     * @param int $weight Relative routing weight for this IP in the pool. Positive integer; defaults to 100.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        string $dedicatedIPID,
        ?int $weight = null,
        RequestOptions|array|null $requestOptions = null,
    ): IPNewResponse {
        $params = array_filter(
            [
                'dedicatedIPID' => $dedicatedIPID, 'weight' => $weight ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove the dedicated IP from the pool. The IP is kept but carries no mail until added to a pool again. Removing the last IP requires `force=true` and `drain=true`.
     *
     * @param string $ipID path param: The dedicated IP identifier (UUID)
     * @param string $id path param: The IP pool identifier (UUID)
     * @param bool $drain Query param: Set together with `force=true` to remove the last IP in the pool. Acknowledges that mail routed to the emptied pool is held until the pool has a sendable IP again.
     * @param bool $force Query param: Set together with `drain=true` to remove the last IP in the pool. Either flag alone has no effect.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $ipID,
        string $id,
        bool $drain = false,
        bool $force = false,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = ['id' => $id, 'drain' => $drain, 'force' => $force];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($ipID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
