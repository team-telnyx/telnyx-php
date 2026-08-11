<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rcs\Agents;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Rcs\Agents\TestDevices\TestDeviceResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TestDevicesContract
{
    /**
     * @api
     *
     * @param string $id the Telnyx-assigned agent identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null,
    ): TestDeviceResponse;

    /**
     * @api
     *
     * @param string $id the Telnyx-assigned agent identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return list<TestDeviceResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param string $testDeviceID the Telnyx-assigned test device identifier
     * @param string $id the Telnyx-assigned agent identifier
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $testDeviceID,
        string $id,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
