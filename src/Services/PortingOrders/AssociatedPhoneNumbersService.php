<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberDeleteResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Filter\Action;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Sort\Value;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\AssociatedPhoneNumbersContract;

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
    ): AssociatedPhoneNumberListResponse {
        $params = Util::removeNulls(
            ['filter' => $filter, 'page' => $page, 'sort' => $sort]
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
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        string $portingOrderID,
        ?RequestOptions $requestOptions = null
    ): AssociatedPhoneNumberDeleteResponse {
        $params = Util::removeNulls(['portingOrderID' => $portingOrderID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
