<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddress;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressCreateParams;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressDeleteResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressGetResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressNewResponse;
use Telnyx\RequestOptions;

interface DynamicEmergencyAddressesContract
{
    /**
     * @api
     *
     * @param array<mixed>|DynamicEmergencyAddressCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|DynamicEmergencyAddressCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): DynamicEmergencyAddressNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DynamicEmergencyAddressGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|DynamicEmergencyAddressListParams $params
     *
     * @return DefaultPagination<DynamicEmergencyAddress>
     *
     * @throws APIException
     */
    public function list(
        array|DynamicEmergencyAddressListParams $params,
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
    ): DynamicEmergencyAddressDeleteResponse;
}
