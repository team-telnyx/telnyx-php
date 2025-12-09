<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationCreateParams;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListResponse;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationNewResponse;
use Telnyx\RequestOptions;

interface PhoneNumberConfigurationsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberConfigurationCreateParams $params
     *
     * @return BaseResponse<PhoneNumberConfigurationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PhoneNumberConfigurationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberConfigurationListParams $params
     *
     * @return BaseResponse<PhoneNumberConfigurationListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|PhoneNumberConfigurationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
