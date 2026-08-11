<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rcs\Agents;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Rcs\Agents\TestDevices\TestDeviceCreateParams;
use Telnyx\Rcs\Agents\TestDevices\TestDeviceDeleteParams;
use Telnyx\Rcs\Agents\TestDevices\TestDeviceResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TestDevicesRawContract
{
    /**
     * @api
     *
     * @param string $id the Telnyx-assigned agent identifier
     * @param array<string,mixed>|TestDeviceCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TestDeviceResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|TestDeviceCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the Telnyx-assigned agent identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<TestDeviceResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $testDeviceID the Telnyx-assigned test device identifier
     * @param array<string,mixed>|TestDeviceDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $testDeviceID,
        array|TestDeviceDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
