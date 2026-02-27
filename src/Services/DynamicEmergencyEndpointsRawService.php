<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpoint;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointCreateParams;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointDeleteResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointGetResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams\Filter;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DynamicEmergencyEndpointsRawContract;

/**
 * Dynamic Emergency Endpoints.
 *
 * @phpstan-import-type FilterShape from \Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DynamicEmergencyEndpointNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|DynamicEmergencyEndpointCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DynamicEmergencyEndpointGetResponse>
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
     *   filter?: Filter|FilterShape, pageNumber?: int, pageSize?: int
     * }|DynamicEmergencyEndpointListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<DynamicEmergencyEndpoint>>
     *
     * @throws APIException
     */
    public function list(
        array|DynamicEmergencyEndpointListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DynamicEmergencyEndpointListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'dynamic_emergency_endpoints',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: DynamicEmergencyEndpoint::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes the dynamic emergency endpoint based on the ID provided
     *
     * @param string $id Dynamic Emergency Endpoint id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DynamicEmergencyEndpointDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
