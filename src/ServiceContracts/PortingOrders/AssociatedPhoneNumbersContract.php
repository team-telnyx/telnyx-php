<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams\Action;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams\PhoneNumberRange;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberDeleteResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Filter;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Sort;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberNewResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type PhoneNumberRangeShape from \Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams\PhoneNumberRange
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Filter
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Sort
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AssociatedPhoneNumbersContract
{
    /**
     * @api
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number
     * @param Action|value-of<Action> $action specifies the action to take with this phone number during partial porting
     * @param PhoneNumberRange|PhoneNumberRangeShape $phoneNumberRange
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        Action|string $action,
        PhoneNumberRange|array $phoneNumberRange,
        RequestOptions|array|null $requestOptions = null,
    ): AssociatedPhoneNumberNewResponse;

    /**
     * @api
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone numbers
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[action]
     * @param Sort|SortShape $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PortingAssociatedPhoneNumber>
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|array|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id Identifies the associated phone number to be deleted
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        string $portingOrderID,
        RequestOptions|array|null $requestOptions = null,
    ): AssociatedPhoneNumberDeleteResponse;
}
