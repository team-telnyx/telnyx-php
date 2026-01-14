<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams\Action;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams\PhoneNumberRange;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberDeleteResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Filter;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Sort;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberNewResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\AssociatedPhoneNumbersContract;

/**
 * @phpstan-import-type PhoneNumberRangeShape from \Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams\PhoneNumberRange
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Filter
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Sort
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AssociatedPhoneNumbersService implements AssociatedPhoneNumbersContract
{
    /**
     * @api
     */
    public AssociatedPhoneNumbersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AssociatedPhoneNumbersRawService($client);
    }

    /**
     * @api
     *
     * Creates a new associated phone number for a porting order. This is used for partial porting in GB to specify which phone numbers should be kept or disconnected.
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
    ): AssociatedPhoneNumberNewResponse {
        $params = Util::removeNulls(
            ['action' => $action, 'phoneNumberRange' => $phoneNumberRange]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($portingOrderID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of all associated phone numbers for a porting order. Associated phone numbers are used for partial porting in GB to specify which phone numbers should be kept or disconnected.
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($portingOrderID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes an associated phone number from a porting order.
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
    ): AssociatedPhoneNumberDeleteResponse {
        $params = Util::removeNulls(['portingOrderID' => $portingOrderID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
