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
use Telnyx\ServiceContracts\DynamicEmergencyEndpointsContract;

final class DynamicEmergencyEndpointsService implements DynamicEmergencyEndpointsContract
{
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
     *   callback_number: string,
     *   caller_name: string,
     *   dynamic_emergency_address_id: string,
     * }|DynamicEmergencyEndpointCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|DynamicEmergencyEndpointCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): DynamicEmergencyEndpointNewResponse {
        [$parsed, $options] = DynamicEmergencyEndpointCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<DynamicEmergencyEndpointNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'dynamic_emergency_endpoints',
            body: (object) $parsed,
            options: $options,
            convert: DynamicEmergencyEndpointNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the dynamic emergency endpoint based on the ID provided
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyEndpointGetResponse {
        /** @var BaseResponse<DynamicEmergencyEndpointGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['dynamic_emergency_endpoints/%1$s', $id],
            options: $requestOptions,
            convert: DynamicEmergencyEndpointGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the dynamic emergency endpoints according to filters
     *
     * @param array{
     *   filter?: array{
     *     country_code?: string, status?: 'pending'|'activated'|'rejected'|Status
     *   },
     *   page?: array{number?: int, size?: int},
     * }|DynamicEmergencyEndpointListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|DynamicEmergencyEndpointListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DynamicEmergencyEndpointListResponse {
        [$parsed, $options] = DynamicEmergencyEndpointListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<DynamicEmergencyEndpointListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'dynamic_emergency_endpoints',
            query: $parsed,
            options: $options,
            convert: DynamicEmergencyEndpointListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes the dynamic emergency endpoint based on the ID provided
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyEndpointDeleteResponse {
        /** @var BaseResponse<DynamicEmergencyEndpointDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['dynamic_emergency_endpoints/%1$s', $id],
            options: $requestOptions,
            convert: DynamicEmergencyEndpointDeleteResponse::class,
        );

        return $response->parse();
    }
}
