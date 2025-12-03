<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberDeleteParams;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberDeleteResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberNewResponse;
use Telnyx\RequestOptions;

interface AssociatedPhoneNumbersContract
{
    /**
     * @api
     *
     * @param array<mixed>|AssociatedPhoneNumberCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        array|AssociatedPhoneNumberCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssociatedPhoneNumberNewResponse;

    /**
     * @api
     *
     * @param array<mixed>|AssociatedPhoneNumberListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        array|AssociatedPhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssociatedPhoneNumberListResponse;

    /**
     * @api
     *
     * @param array<mixed>|AssociatedPhoneNumberDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|AssociatedPhoneNumberDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssociatedPhoneNumberDeleteResponse;
}
