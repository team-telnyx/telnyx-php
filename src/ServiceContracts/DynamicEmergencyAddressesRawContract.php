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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface DynamicEmergencyAddressesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|DynamicEmergencyAddressCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DynamicEmergencyAddressNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|DynamicEmergencyAddressCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Dynamic Emergency Address id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DynamicEmergencyAddressGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DynamicEmergencyAddressListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<DynamicEmergencyAddress>>
     *
     * @throws APIException
     */
    public function list(
        array|DynamicEmergencyAddressListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Dynamic Emergency Address id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DynamicEmergencyAddressDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
