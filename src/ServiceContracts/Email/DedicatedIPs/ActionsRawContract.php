<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Email\DedicatedIPs;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Email\DedicatedIPs\DedicatedIPShowResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $id the dedicated IP identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DedicatedIPShowResponse>
     *
     * @throws APIException
     */
    public function completeWarmup(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the dedicated IP identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DedicatedIPShowResponse>
     *
     * @throws APIException
     */
    public function pauseWarmup(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the dedicated IP identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DedicatedIPShowResponse>
     *
     * @throws APIException
     */
    public function resumeWarmup(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the dedicated IP identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DedicatedIPShowResponse>
     *
     * @throws APIException
     */
    public function startWarmup(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
