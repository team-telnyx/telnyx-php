<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams\Action;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams\PhoneNumberRange;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberDeleteParams;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberDeleteResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Filter;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Page;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Sort;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\AssociatedPhoneNumbersContract;

use const Telnyx\Core\OMIT as omit;

final class AssociatedPhoneNumbersService implements AssociatedPhoneNumbersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new associated phone number for a porting order. This is used for partial porting in GB to specify which phone numbers should be kept or disconnected.
     *
     * @param Action|value-of<Action> $action specifies the action to take with this phone number during partial porting
     * @param PhoneNumberRange $phoneNumberRange
     */
    public function create(
        string $portingOrderID,
        $action,
        $phoneNumberRange,
        ?RequestOptions $requestOptions = null,
    ): AssociatedPhoneNumberNewResponse {
        [$parsed, $options] = AssociatedPhoneNumberCreateParams::parseRequest(
            ['action' => $action, 'phoneNumberRange' => $phoneNumberRange],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['porting_orders/%1$s/associated_phone_numbers', $portingOrderID],
            body: (object) $parsed,
            options: $options,
            convert: AssociatedPhoneNumberNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of all associated phone numbers for a porting order. Associated phone numbers are used for partial porting in GB to specify which phone numbers should be kept or disconnected.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[action]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     */
    public function list(
        string $portingOrderID,
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): AssociatedPhoneNumberListResponse {
        [$parsed, $options] = AssociatedPhoneNumberListParams::parseRequest(
            ['filter' => $filter, 'page' => $page, 'sort' => $sort],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/associated_phone_numbers', $portingOrderID],
            query: $parsed,
            options: $options,
            convert: AssociatedPhoneNumberListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes an associated phone number from a porting order.
     *
     * @param string $portingOrderID
     */
    public function delete(
        string $id,
        $portingOrderID,
        ?RequestOptions $requestOptions = null
    ): AssociatedPhoneNumberDeleteResponse {
        [$parsed, $options] = AssociatedPhoneNumberDeleteParams::parseRequest(
            ['portingOrderID' => $portingOrderID],
            $requestOptions
        );
        $portingOrderID = $parsed['portingOrderID'];
        unset($parsed['portingOrderID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'porting_orders/%1$s/associated_phone_numbers/%2$s',
                $portingOrderID,
                $id,
            ],
            options: $options,
            convert: AssociatedPhoneNumberDeleteResponse::class,
        );
    }
}
