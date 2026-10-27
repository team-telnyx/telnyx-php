<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Email\DedicatedIPs;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Email\DedicatedIPs\DedicatedIPShowResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param string $id the dedicated IP identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function completeWarmup(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DedicatedIPShowResponse;

    /**
     * @api
     *
     * @param string $id the dedicated IP identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function pauseWarmup(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DedicatedIPShowResponse;

    /**
     * @api
     *
     * @param string $id the dedicated IP identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function resumeWarmup(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DedicatedIPShowResponse;

    /**
     * @api
     *
     * @param string $id the dedicated IP identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function startWarmup(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DedicatedIPShowResponse;
}
