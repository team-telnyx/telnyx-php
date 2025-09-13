<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams\Action;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams\PhoneNumberRange;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberDeleteResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Filter;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Page;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Sort;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface AssociatedPhoneNumbersContract
{
    /**
     * @api
     *
     * @param Action|value-of<Action> $action specifies the action to take with this phone number during partial porting
     * @param PhoneNumberRange $phoneNumberRange
     *
     * @return AssociatedPhoneNumberNewResponse<HasRawResponse>
     */
    public function create(
        string $portingOrderID,
        $action,
        $phoneNumberRange,
        ?RequestOptions $requestOptions = null,
    ): AssociatedPhoneNumberNewResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[action]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @return AssociatedPhoneNumberListResponse<HasRawResponse>
     */
    public function list(
        string $portingOrderID,
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): AssociatedPhoneNumberListResponse;

    /**
     * @api
     *
     * @param string $portingOrderID
     *
     * @return AssociatedPhoneNumberDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        $portingOrderID,
        ?RequestOptions $requestOptions = null
    ): AssociatedPhoneNumberDeleteResponse;
}
