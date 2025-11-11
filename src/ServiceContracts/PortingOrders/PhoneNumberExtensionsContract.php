<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionDeleteParams;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionNewResponse;
use Telnyx\RequestOptions;

interface PhoneNumberExtensionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberExtensionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        array|PhoneNumberExtensionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberExtensionNewResponse;

    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberExtensionListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        array|PhoneNumberExtensionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberExtensionListResponse;

    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberExtensionDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|PhoneNumberExtensionDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberExtensionDeleteResponse;
}
