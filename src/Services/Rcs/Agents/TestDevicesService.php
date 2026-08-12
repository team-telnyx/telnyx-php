<?php

declare(strict_types=1);

namespace Telnyx\Services\Rcs\Agents;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Rcs\Agents\TestDevices\TestDeviceResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Rcs\Agents\TestDevicesContract;

/**
 * Manage RCS agent registration, testing, verification, and launch.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TestDevicesService implements TestDevicesContract
{
    /**
     * @api
     */
    public TestDevicesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TestDevicesRawService($client);
    }

    /**
     * @api
     *
     * Adds an RCS-capable test number after provider agent creation. Repeating the request for a number already attached to the agent returns the existing test device.
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
    ): TestDeviceResponse {
        $params = Util::removeNulls(['phoneNumber' => $phoneNumber]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists test devices attached to an RCS agent.
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
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Removes a test device from an RCS agent and its provider registration.
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
    ): mixed {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($testDeviceID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
