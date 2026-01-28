<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpoint;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointDeleteResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointGetResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams\Filter;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface DynamicEmergencyEndpointsContract
{
    /**
     * @api
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
    ): DynamicEmergencyEndpointNewResponse;

    /**
     * @api
     *
     * @param string $id Dynamic Emergency Endpoint id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DynamicEmergencyEndpointGetResponse;

    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id Dynamic Emergency Endpoint id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DynamicEmergencyEndpointDeleteResponse;
}
