<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpoint;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointCreateParams;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointDeleteResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointGetResponse;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointNewResponse;
use Telnyx\RequestOptions;

interface DynamicEmergencyEndpointsContract
{
    /**
     * @api
     *
     * @param array<mixed>|DynamicEmergencyEndpointCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|DynamicEmergencyEndpointCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): DynamicEmergencyEndpointNewResponse;

    /**
     * @api
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
     * @param array<mixed>|DynamicEmergencyEndpointListParams $params
     *
     * @return DefaultPagination<DynamicEmergencyEndpoint>
     *
     * @throws APIException
     */
    public function list(
        array|DynamicEmergencyEndpointListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyEndpointDeleteResponse;
}
