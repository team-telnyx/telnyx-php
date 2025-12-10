<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointDeleteResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointGetResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams\Filter\Status;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointNewResponse;
use Telnyx\RequestOptions;

interface DynamicEmergencyEndpointsContract
{
    /**
     * @api
     *
     * @param string $dynamicEmergencyAddressID an id of a currently active dynamic emergency location
     *
     * @throws APIException
     */
    public function create(
        string $callbackNumber,
        string $callerName,
        string $dynamicEmergencyAddressID,
        ?RequestOptions $requestOptions = null,
    ): DynamicEmergencyEndpointNewResponse;

    /**
     * @api
     *
     * @param string $id Dynamic Emergency Endpoint id
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyEndpointGetResponse;

    /**
     * @api
     *
     * @param array{
     *   countryCode?: string, status?: 'pending'|'activated'|'rejected'|Status
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[country_code]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DynamicEmergencyEndpointListResponse;

    /**
     * @api
     *
     * @param string $id Dynamic Emergency Endpoint id
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyEndpointDeleteResponse;
}
