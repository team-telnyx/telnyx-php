<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationCreateParams;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListResponse;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationNewResponse;
use Telnyx\RequestOptions;

interface PhoneNumberConfigurationsContract
{
    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberConfigurationCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|PhoneNumberConfigurationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberConfigurationNewResponse;

    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberConfigurationListParams $params
     *
     * @return DefaultPagination<PhoneNumberConfigurationListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|PhoneNumberConfigurationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
