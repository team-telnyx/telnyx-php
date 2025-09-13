<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointDeleteResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointGetResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams\Filter;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams\Page;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface DynamicEmergencyEndpointsContract
{
    /**
     * @api
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
    ): DynamicEmergencyEndpointNewResponse;

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
    ): DynamicEmergencyEndpointNewResponse;

    /**
     * @api
     *
     * @return DynamicEmergencyEndpointGetResponse<HasRawResponse>
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
     * @return DynamicEmergencyEndpointGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyEndpointGetResponse;

    /**
     * @api
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
    ): DynamicEmergencyEndpointListResponse;

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
    ): DynamicEmergencyEndpointListResponse;

    /**
     * @api
     *
     * @return DynamicEmergencyEndpointDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyEndpointDeleteResponse;

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
    ): DynamicEmergencyEndpointDeleteResponse;
}
