<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockDeleteParams;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListResponse;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockNewResponse;
use Telnyx\RequestOptions;

interface PhoneNumberBlocksContract
{
    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberBlockCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        array|PhoneNumberBlockCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberBlockNewResponse;

    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberBlockListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        array|PhoneNumberBlockListParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberBlockListResponse;

    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberBlockDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|PhoneNumberBlockDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberBlockDeleteResponse;
}
