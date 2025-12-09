<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddress;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressCreateParams;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressDeleteResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressGetResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressListParams;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressNewResponse;
use Telnyx\RequestOptions;

interface DynamicEmergencyAddressesRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|DynamicEmergencyAddressCreateParams $params
     *
     * @return BaseResponse<DynamicEmergencyAddressNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|DynamicEmergencyAddressCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Dynamic Emergency Address id
     *
     * @return BaseResponse<DynamicEmergencyAddressGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|DynamicEmergencyAddressListParams $params
     *
     * @return BaseResponse<DefaultPagination<DynamicEmergencyAddress>>
     *
     * @throws APIException
     */
    public function list(
        array|DynamicEmergencyAddressListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Dynamic Emergency Address id
     *
     * @return BaseResponse<DynamicEmergencyAddressDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
