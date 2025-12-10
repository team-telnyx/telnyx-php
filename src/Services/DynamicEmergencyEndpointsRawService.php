<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointCreateParams;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointDeleteResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointGetResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams\Filter\Status;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DynamicEmergencyEndpointsRawContract;

final class DynamicEmergencyEndpointsRawService implements DynamicEmergencyEndpointsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a dynamic emergency endpoints.
     *
     * @param array{
     *   callbackNumber: string, callerName: string, dynamicEmergencyAddressID: string
     * }|DynamicEmergencyEndpointCreateParams $params
     *
     * @return BaseResponse<DynamicEmergencyEndpointNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|DynamicEmergencyEndpointCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DynamicEmergencyEndpointCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'dynamic_emergency_endpoints',
            body: (object) $parsed,
            options: $options,
            convert: DynamicEmergencyEndpointNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the dynamic emergency endpoint based on the ID provided
     *
     * @param string $id Dynamic Emergency Endpoint id
     *
     * @return BaseResponse<DynamicEmergencyEndpointGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['dynamic_emergency_endpoints/%1$s', $id],
            options: $requestOptions,
            convert: DynamicEmergencyEndpointGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the dynamic emergency endpoints according to filters
     *
     * @param array{
     *   filter?: array{
     *     countryCode?: string, status?: 'pending'|'activated'|'rejected'|Status
     *   },
     *   page?: array{number?: int, size?: int},
     * }|DynamicEmergencyEndpointListParams $params
     *
     * @return BaseResponse<DynamicEmergencyEndpointListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|DynamicEmergencyEndpointListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DynamicEmergencyEndpointListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'dynamic_emergency_endpoints',
            query: $parsed,
            options: $options,
            convert: DynamicEmergencyEndpointListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes the dynamic emergency endpoint based on the ID provided
     *
     * @param string $id Dynamic Emergency Endpoint id
     *
     * @return BaseResponse<DynamicEmergencyEndpointDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['dynamic_emergency_endpoints/%1$s', $id],
            options: $requestOptions,
            convert: DynamicEmergencyEndpointDeleteResponse::class,
        );
    }
}
