<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Email;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Email\DedicatedIPs\DedicatedIPCreateParams\IPVersion;
use Telnyx\Email\DedicatedIPs\DedicatedIPCreateParams\Region;
use Telnyx\Email\DedicatedIPs\DedicatedIPListParams\FilterStatus;
use Telnyx\Email\DedicatedIPs\DedicatedIPListResponse;
use Telnyx\Email\DedicatedIPs\DedicatedIPShowResponse;
use Telnyx\Email\DedicatedIPs\DedicatedIPUpdateParams\Warmup;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type WarmupShape from \Telnyx\Email\DedicatedIPs\DedicatedIPUpdateParams\Warmup
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface DedicatedIPsContract
{
    /**
     * @api
     *
     * @param string $idempotencyKey Header param: Required. Opaque, unquoted key for safely retrying the same purchase. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each purchase and reuse it only when retrying that purchase with the same request. A missing header, or an invalid one —including duplicate, empty, malformed, or overlong values—returns 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param IPVersion|value-of<IPVersion> $ipVersion Body param: Allocate an IP of this address family. Supported value: `ipv4`. Any other value, including `ipv6` or `null`, returns `422`.
     * @param Region|value-of<Region> $region Body param: Allocate an IP in this region. Supported value: `ewr-nj1`. Any other value, including an empty string or `null`, returns `422`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $idempotencyKey,
        IPVersion|string|null $ipVersion = null,
        Region|string|null $region = null,
        RequestOptions|array|null $requestOptions = null,
    ): DedicatedIPShowResponse;

    /**
     * @api
     *
     * @param string $id the dedicated IP identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DedicatedIPShowResponse;

    /**
     * @api
     *
     * @param string $id the dedicated IP identifier (UUID)
     * @param bool $drain Set together with `force: true` to move the last IP out of its current pool. Acknowledges that mail routed to the emptied pool is held. Used only with `pool_id`.
     * @param bool $force Set together with `drain: true` to move the last IP out of its current pool. Used only with `pool_id`.
     * @param string $poolID Move the IP to this pool, replacing its current membership. Use the IP's current pool to change only its weight. To take an IP out of a pool, use `DELETE /email/ip_pools/{id}/ips/{ip_id}`.
     * @param Warmup|WarmupShape $warmup alias for `warmup_paused`
     * @param bool $warmupPaused Pause (`true`) or resume (`false`) the warm-up ramp; equivalent to the `pause_warmup` and `resume_warmup` actions. A Boolean value takes precedence over `warmup.paused`. When a pause field is present and `pool_id` is absent, supplying neither pause field as a Boolean invokes resume.
     * @param int $weight Routing weight in the target pool. Used only with `pool_id`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        bool $drain = false,
        bool $force = false,
        ?string $poolID = null,
        Warmup|array|null $warmup = null,
        ?bool $warmupPaused = null,
        int $weight = 100,
        RequestOptions|array|null $requestOptions = null,
    ): DedicatedIPShowResponse;

    /**
     * @api
     *
     * @param string $filterPoolID Return only IPs in this pool (exact match on `pool_id`). A value that is not a UUID returns an empty list. An empty value applies no filter.
     * @param string $filterRegion Return only IPs in this region (exact, case-sensitive match on `region`). An empty value applies no filter.
     * @param FilterStatus|value-of<FilterStatus> $filterStatus Return only IPs in this lifecycle status (exact match). Any other value returns an empty list. An empty value applies no filter.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?string $filterPoolID = null,
        ?string $filterRegion = null,
        FilterStatus|string|null $filterStatus = null,
        RequestOptions|array|null $requestOptions = null,
    ): DedicatedIPListResponse;

    /**
     * @api
     *
     * @param string $id path param: The dedicated IP identifier (UUID)
     * @param bool $drain Body param: Set together with `force: true` to release the last IP in a pool. Acknowledges that mail routed to the emptied pool is held until the pool has a sendable IP again.
     * @param bool $force Body param: Set together with `drain: true` to release the last IP in a pool. Either flag alone has no effect.
     * @param string $reason body param: Free-text reason recorded with the release
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        bool $drain = false,
        bool $force = false,
        ?string $reason = null,
        RequestOptions|array|null $requestOptions = null,
    ): DedicatedIPShowResponse;
}
