<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpoint;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointDeleteResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointGetResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams\Filter;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DynamicEmergencyEndpointsContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DynamicEmergencyEndpointsService implements DynamicEmergencyEndpointsContract
{
    /**
     * @api
     */
    public DynamicEmergencyEndpointsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DynamicEmergencyEndpointsRawService($client);
    }

    /**
     * @api
     *
     * Creates a dynamic emergency endpoints.
     *
     * @param string $dynamicEmergencyAddressID an id of a currently active dynamic emergency location
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $callbackNumber,
        string $callerName,
        string $dynamicEmergencyAddressID,
        RequestOptions|array|null $requestOptions = null,
    ): DynamicEmergencyEndpointNewResponse {
        $params = Util::removeNulls(
            [
                'callbackNumber' => $callbackNumber,
                'callerName' => $callerName,
                'dynamicEmergencyAddressID' => $dynamicEmergencyAddressID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the dynamic emergency endpoint based on the ID provided
     *
     * @param string $id Dynamic Emergency Endpoint id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DynamicEmergencyEndpointGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the dynamic emergency endpoints according to filters
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[country_code]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<DynamicEmergencyEndpoint>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes the dynamic emergency endpoint based on the ID provided
     *
     * @param string $id Dynamic Emergency Endpoint id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DynamicEmergencyEndpointDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
