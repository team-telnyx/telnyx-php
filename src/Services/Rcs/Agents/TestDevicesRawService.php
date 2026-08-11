<?php

declare(strict_types=1);

namespace Telnyx\Services\Rcs\Agents;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Rcs\Agents\TestDevices\TestDeviceCreateParams;
use Telnyx\Rcs\Agents\TestDevices\TestDeviceDeleteParams;
use Telnyx\Rcs\Agents\TestDevices\TestDeviceResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Rcs\Agents\TestDevicesRawContract;

/**
 * Manage RCS agent registration, testing, verification, and launch.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TestDevicesRawService implements TestDevicesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Adds an RCS-capable test number after provider agent creation. Repeating the request for a number already attached to the agent returns the existing test device.
     *
     * @param string $id the Telnyx-assigned agent identifier
     * @param array{phoneNumber: string}|TestDeviceCreateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = TestDeviceCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['rcs/agents/%1$s/test_devices', $id],
            body: (object) $parsed,
            options: $options,
            convert: TestDeviceResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists test devices attached to an RCS agent.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['rcs/agents/%1$s/test_devices', $id],
            options: $requestOptions,
            convert: new ListOf(TestDeviceResponse::class),
        );
    }

    /**
     * @api
     *
     * Removes a test device from an RCS agent and its provider registration.
     *
     * @param string $testDeviceID the Telnyx-assigned test device identifier
     * @param array{id: string}|TestDeviceDeleteParams $params
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
    ): BaseResponse {
        [$parsed, $options] = TestDeviceDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['rcs/agents/%1$s/test_devices/%2$s', $id, $testDeviceID],
            options: $options,
            convert: null,
        );
    }
}
