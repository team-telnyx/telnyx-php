<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointCreateParams;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointDeleteResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointGetResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams\Filter;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams\Page;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DynamicEmergencyEndpointsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $callbackNumber
     * @param string $callerName
     * @param string $dynamicEmergencyAddressID an id of a currently active dynamic emergency location
     *
     * @return DynamicEmergencyEndpointNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $callbackNumber,
        $callerName,
        $dynamicEmergencyAddressID,
        ?RequestOptions $requestOptions = null,
    ): DynamicEmergencyEndpointNewResponse {
        $params = [
            'callbackNumber' => $callbackNumber,
            'callerName' => $callerName,
            'dynamicEmergencyAddressID' => $dynamicEmergencyAddressID,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return DynamicEmergencyEndpointNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyEndpointNewResponse {
        [$parsed, $options] = DynamicEmergencyEndpointCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @return DynamicEmergencyEndpointGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyEndpointGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return DynamicEmergencyEndpointGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyEndpointGetResponse {
        // @phpstan-ignore-next-line;
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[country_code]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DynamicEmergencyEndpointListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyEndpointListResponse {
        $params = ['filter' => $filter, 'page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return DynamicEmergencyEndpointListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyEndpointListResponse {
        [$parsed, $options] = DynamicEmergencyEndpointListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @return DynamicEmergencyEndpointDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyEndpointDeleteResponse {
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return DynamicEmergencyEndpointDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyEndpointDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['dynamic_emergency_endpoints/%1$s', $id],
            options: $requestOptions,
            convert: DynamicEmergencyEndpointDeleteResponse::class,
        );
    }
}
