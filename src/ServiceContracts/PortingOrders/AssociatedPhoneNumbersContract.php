<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberDeleteResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Filter\Action;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Sort\Value;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberNewResponse;
use Telnyx\RequestOptions;

interface AssociatedPhoneNumbersContract
{
    /**
     * @api
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number
     * @param 'keep'|'disconnect'|\Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams\Action $action specifies the action to take with this phone number during partial porting
     * @param array{endAt?: string, startAt?: string} $phoneNumberRange
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        string|\Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams\Action $action,
        array $phoneNumberRange,
        ?RequestOptions $requestOptions = null,
    ): AssociatedPhoneNumberNewResponse;

    /**
     * @api
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone numbers
     * @param array{
     *   action?: 'keep'|'disconnect'|Action, phoneNumber?: string
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[action]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param array{
     *   value?: '-created_at'|'created_at'|Value
     * } $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        ?array $filter = null,
        ?array $page = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): AssociatedPhoneNumberListResponse;

    /**
     * @api
     *
     * @param string $id Identifies the associated phone number to be deleted
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        string $portingOrderID,
        ?RequestOptions $requestOptions = null
    ): AssociatedPhoneNumberDeleteResponse;
}
