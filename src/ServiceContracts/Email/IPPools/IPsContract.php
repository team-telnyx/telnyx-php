<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Email\IPPools;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Email\IPPools\IPs\IPNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface IPsContract
{
    /**
     * @api
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
    ): IPNewResponse;

    /**
     * @api
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
    ): mixed;
}
