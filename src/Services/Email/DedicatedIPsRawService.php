<?php

declare(strict_types=1);

namespace Telnyx\Services\Email;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Email\DedicatedIPs\DedicatedIPCreateParams;
use Telnyx\Email\DedicatedIPs\DedicatedIPCreateParams\IPVersion;
use Telnyx\Email\DedicatedIPs\DedicatedIPCreateParams\Region;
use Telnyx\Email\DedicatedIPs\DedicatedIPDeleteParams;
use Telnyx\Email\DedicatedIPs\DedicatedIPListParams;
use Telnyx\Email\DedicatedIPs\DedicatedIPListParams\FilterStatus;
use Telnyx\Email\DedicatedIPs\DedicatedIPListResponse;
use Telnyx\Email\DedicatedIPs\DedicatedIPShowResponse;
use Telnyx\Email\DedicatedIPs\DedicatedIPUpdateParams;
use Telnyx\Email\DedicatedIPs\DedicatedIPUpdateParams\Warmup;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Email\DedicatedIPsRawContract;

/**
 * Purchase and manage dedicated sending IP addresses for your Telnyx email traffic.
 *
 * @phpstan-import-type WarmupShape from \Telnyx\Email\DedicatedIPs\DedicatedIPUpdateParams\Warmup
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DedicatedIPsRawService implements DedicatedIPsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Purchase a dedicated sending IP. Requires a verified, enterprise, or legacy account, and an `Idempotency-Key` header: a request without the header returns `400` (code `10015`) and allocates nothing. Telnyx allocates the next available IP from stock. The optional `region` and `ip_version` fields each restrict which stock IP is allocated; they never change the allocated IP's metadata. An omitted field applies no restriction for that field, and omitting the body applies neither restriction. An unsupported selector value returns `422`; a supported value that matches no available IP returns `429` and records the request on the waitlist. Billing: $14/month/IP, charged as a monthly recurring charge (MRC) from purchase. The IP is returned in `provisioning` status with a Telnyx-managed PTR hostname and carries no mail until you call `start_warmup` and add it to a pool that routes mail.
     *
     * @param array{
     *   idempotencyKey: string,
     *   ipVersion?: IPVersion|value-of<IPVersion>,
     *   region?: Region|value-of<Region>,
     * }|DedicatedIPCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DedicatedIPShowResponse>
     *
     * @throws APIException
     */
    public function create(
        array|DedicatedIPCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DedicatedIPCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $header_params = ['idempotencyKey' => 'Idempotency-Key'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'email/dedicated_ips',
            headers: Util::array_transform_keys(
                array_intersect_key($parsed, array_flip(array_keys($header_params))),
                $header_params,
            ),
            body: (object) array_diff_key(
                $parsed,
                array_flip(array_keys($header_params))
            ),
            options: $options,
            convert: DedicatedIPShowResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a single dedicated IP by its identifier, including warm-up state, billing state, and the DNS/PTR provisioning checklist.
     *
     * @param string $id the dedicated IP identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DedicatedIPShowResponse>
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
            path: ['email/dedicated_ips/%1$s', $id],
            options: $requestOptions,
            convert: DedicatedIPShowResponse::class,
        );
    }

    /**
     * @api
     *
     * Move the IP to another pool, or pause/resume its warm-up ramp. One change applies per request. `pool_id` takes precedence over warm-up changes. Otherwise, use `warmup_paused` or `warmup.paused`; a Boolean `warmup_paused` takes precedence. Moving the last IP out of a pool requires `force: true` and `drain: true`. The PTR hostname is managed by Telnyx: a request that includes `ptr_hostname` returns `422` unless `pool_id` or a warm-up field is present, in which case `ptr_hostname` is ignored.
     *
     * @param string $id the dedicated IP identifier (UUID)
     * @param array{
     *   drain?: bool,
     *   force?: bool,
     *   poolID?: string,
     *   warmup?: Warmup|WarmupShape,
     *   warmupPaused?: bool,
     *   weight?: int,
     * }|DedicatedIPUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DedicatedIPShowResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|DedicatedIPUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DedicatedIPUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['email/dedicated_ips/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: DedicatedIPShowResponse::class,
        );
    }

    /**
     * @api
     *
     * List the dedicated sending IPs owned by the account, newest first. Narrow the list with `filter[status]`, `filter[pool_id]`, and `filter[region]`; supplied filters combine, so an IP must match every one. An empty value, or a nested or array value such as `filter[status][]=active`, applies no filter, and other `filter[...]` keys are ignored. A value that no IP can match (an unknown status, a `pool_id` that is not a UUID, or a value containing a NUL byte) returns an empty list, not an error.
     *
     * @param array{
     *   filterPoolID?: string,
     *   filterRegion?: string,
     *   filterStatus?: FilterStatus|value-of<FilterStatus>,
     * }|DedicatedIPListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DedicatedIPListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|DedicatedIPListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DedicatedIPListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'email/dedicated_ips',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterPoolID' => 'filter[pool_id]',
                    'filterRegion' => 'filter[region]',
                    'filterStatus' => 'filter[status]',
                ],
            ),
            options: $options,
            convert: DedicatedIPListResponse::class,
        );
    }

    /**
     * @api
     *
     * Release the dedicated IP to Telnyx. The IP stops carrying mail immediately, leaves its pool, and moves to `released`. Telnyx sets `quarantine_until` to 30 days after release. Release requests that the MRC stop asynchronously. Check `billing`: `stopping` means the stop is pending, `stopped` means it completed, and `stop_failed` means the charge remains. If the charge was never created or its creation has not completed, `billing` keeps showing the creation status (`not_started`, `pending`, `in_progress`, or `failed`). Any status except `released` can be released. Releasing the last IP in a pool requires `force=true` and `drain=true`.
     *
     * @param string $id path param: The dedicated IP identifier (UUID)
     * @param array{
     *   drain?: bool, force?: bool, reason?: string
     * }|DedicatedIPDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DedicatedIPShowResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|DedicatedIPDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DedicatedIPDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['drain', 'force', 'reason']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['email/dedicated_ips/%1$s', $id],
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: DedicatedIPShowResponse::class,
        );
    }
}
