<?php

declare(strict_types=1);

namespace Telnyx\Services\Email\DedicatedIPs;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Email\DedicatedIPs\DedicatedIPShowResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Email\DedicatedIPs\ActionsContract;

/**
 * Purchase and manage dedicated sending IP addresses for your Telnyx email traffic.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * Manually complete the warm-up ramp (`warming_up` to `active`), bypassing the schedule. Use only for an IP already warmed elsewhere. Completion sets `warmup.progress` to `100`, clears `warmup.daily_cap`, and applies the ramp-complete allowance to the current UTC day: `warmup.today.cap` becomes `100000000`, `warmup.today.granted` keeps the sends already released today, and `warmup.today.remaining` becomes `cap` minus `granted`. Once completion applies this allowance, an exhausted stage allowance does not block the next eligible first-attempt send. The response reports these values. On an `active` IP, `warmup.progress` and `warmup.daily_cap` are informational: they can keep earlier values after a suspension is lifted and do not limit sending.
     *
     * @param string $id the dedicated IP identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function completeWarmup(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DedicatedIPShowResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->completeWarmup($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Pause the warm-up ramp at its current stage. While paused, the IP releases no first-attempt sends from hold and the ramp does not advance. Only a `warming_up` IP can be paused; pausing an already paused IP refreshes `paused_at`.
     *
     * @param string $id the dedicated IP identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function pauseWarmup(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DedicatedIPShowResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->pauseWarmup($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Resume a paused warm-up ramp from its held stage. Only a `warming_up` IP can be resumed; resuming a ramp that is not paused returns the IP unchanged.
     *
     * @param string $id the dedicated IP identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function resumeWarmup(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DedicatedIPShowResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->resumeWarmup($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Start the warm-up ramp (`provisioning` to `warming_up`). The ramp never starts automatically. Only a `provisioning` IP can be started; a `suspended` IP returns `409`. Starting does not check DNS: the IP carries mail only while `dns_confirmed_at` is set and the IP is in a pool that routes mail.
     *
     * @param string $id the dedicated IP identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function startWarmup(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DedicatedIPShowResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->startWarmup($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
