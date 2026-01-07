<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberDeleteParams;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberDeleteResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberNewResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AssociatedPhoneNumbersRawContract
{
    /**
     * @api
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number
     * @param array<string,mixed>|AssociatedPhoneNumberCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssociatedPhoneNumberNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        array|AssociatedPhoneNumberCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone numbers
     * @param array<string,mixed>|AssociatedPhoneNumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<PortingAssociatedPhoneNumber>>
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        array|AssociatedPhoneNumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Identifies the associated phone number to be deleted
     * @param array<string,mixed>|AssociatedPhoneNumberDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssociatedPhoneNumberDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|AssociatedPhoneNumberDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
