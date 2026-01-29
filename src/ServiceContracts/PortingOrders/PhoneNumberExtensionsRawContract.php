<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionDeleteParams;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionNewResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhoneNumberExtensionsRawContract
{
    /**
     * @api
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number extension
     * @param array<string,mixed>|PhoneNumberExtensionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberExtensionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        array|PhoneNumberExtensionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number extensions
     * @param array<string,mixed>|PhoneNumberExtensionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PortingPhoneNumberExtension>>
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        array|PhoneNumberExtensionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Identifies the phone number extension to be deleted
     * @param array<string,mixed>|PhoneNumberExtensionDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberExtensionDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|PhoneNumberExtensionDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
