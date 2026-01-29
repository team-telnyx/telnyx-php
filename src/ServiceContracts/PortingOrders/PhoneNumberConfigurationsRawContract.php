<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationCreateParams;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListResponse;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhoneNumberConfigurationsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PhoneNumberConfigurationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberConfigurationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PhoneNumberConfigurationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PhoneNumberConfigurationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<PhoneNumberConfigurationListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|PhoneNumberConfigurationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
