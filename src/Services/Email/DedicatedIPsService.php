<?php

declare(strict_types=1);

namespace Telnyx\Services\Email;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\Email\DedicatedIPs\DedicatedIPCreateParams\IPVersion;
use Telnyx\Email\DedicatedIPs\DedicatedIPCreateParams\Region;
use Telnyx\Email\DedicatedIPs\DedicatedIPListParams\FilterStatus;
use Telnyx\Email\DedicatedIPs\DedicatedIPListResponse;
use Telnyx\Email\DedicatedIPs\DedicatedIPShowResponse;
use Telnyx\Email\DedicatedIPs\DedicatedIPUpdateParams\Warmup;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Email\DedicatedIPsContract;
use Telnyx\Services\Email\DedicatedIPs\ActionsService;

/**
 * Purchase and manage dedicated sending IP addresses for your Telnyx email traffic.
 *
 * @phpstan-import-type WarmupShape from \Telnyx\Email\DedicatedIPs\DedicatedIPUpdateParams\Warmup
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DedicatedIPsService implements DedicatedIPsContract
{
    /**
     * @api
     */
    public DedicatedIPsRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DedicatedIPsRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Purchase a dedicated sending IP. Requires a verified, enterprise, or legacy account, and an `Idempotency-Key` header: a request without the header returns `400` (code `10015`) and allocates nothing. Telnyx allocates the next available IP from stock. The optional `region` and `ip_version` fields each restrict which stock IP is allocated; they never change the allocated IP's metadata. An omitted field applies no restriction for that field, and omitting the body applies neither restriction. An unsupported selector value returns `422`; a supported value that matches no available IP returns `429` and records the request on the waitlist. Billing: $14/month/IP, charged as a monthly recurring charge (MRC) from purchase. The IP is returned in `provisioning` status with a Telnyx-managed PTR hostname and carries no mail until you call `start_warmup` and add it to a pool that routes mail.
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
    ): DedicatedIPShowResponse {
        $params = array_filter(
            [
                'idempotencyKey' => $idempotencyKey,
                'ipVersion' => $ipVersion ?? Omitted::VALUE,
                'region' => $region ?? Omitted::VALUE,
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
     * Retrieve a single dedicated IP by its identifier, including warm-up state, billing state, and the DNS/PTR provisioning checklist.
     *
     * @param string $id the dedicated IP identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DedicatedIPShowResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Move the IP to another pool, or pause/resume its warm-up ramp. One change applies per request. `pool_id` takes precedence over warm-up changes. Otherwise, use `warmup_paused` or `warmup.paused`; a Boolean `warmup_paused` takes precedence. Moving the last IP out of a pool requires `force: true` and `drain: true`. The PTR hostname is managed by Telnyx: a request that includes `ptr_hostname` returns `422` unless `pool_id` or a warm-up field is present, in which case `ptr_hostname` is ignored.
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
    ): DedicatedIPShowResponse {
        $params = array_filter(
            [
                'drain' => $drain,
                'force' => $force,
                'poolID' => $poolID ?? Omitted::VALUE,
                'warmup' => $warmup ?? Omitted::VALUE,
                'warmupPaused' => $warmupPaused ?? Omitted::VALUE,
                'weight' => $weight,
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
     * List the dedicated sending IPs owned by the account, newest first. Narrow the list with `filter[status]`, `filter[pool_id]`, and `filter[region]`; supplied filters combine, so an IP must match every one. An empty value, or a nested or array value such as `filter[status][]=active`, applies no filter, and other `filter[...]` keys are ignored. A value that no IP can match (an unknown status, a `pool_id` that is not a UUID, or a value containing a NUL byte) returns an empty list, not an error.
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
    ): DedicatedIPListResponse {
        $params = array_filter(
            [
                'filterPoolID' => $filterPoolID ?? Omitted::VALUE,
                'filterRegion' => $filterRegion ?? Omitted::VALUE,
                'filterStatus' => $filterStatus ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Release the dedicated IP to Telnyx. The IP stops carrying mail immediately, leaves its pool, and moves to `released`. Telnyx sets `quarantine_until` to 30 days after release. Release requests that the MRC stop asynchronously. Check `billing`: `stopping` means the stop is pending, `stopped` means it completed, and `stop_failed` means the charge remains. If the charge was never created or its creation has not completed, `billing` keeps showing the creation status (`not_started`, `pending`, `in_progress`, or `failed`). Any status except `released` can be released. Releasing the last IP in a pool requires `force=true` and `drain=true`.
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
    ): DedicatedIPShowResponse {
        $params = array_filter(
            [
                'drain' => $drain,
                'force' => $force,
                'reason' => $reason ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
