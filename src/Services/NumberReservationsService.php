<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\NumberReservations\NumberReservationCreateParams;
use Telnyx\NumberReservations\NumberReservationGetResponse;
use Telnyx\NumberReservations\NumberReservationListParams;
use Telnyx\NumberReservations\NumberReservationListParams\Filter;
use Telnyx\NumberReservations\NumberReservationListParams\Page;
use Telnyx\NumberReservations\NumberReservationListResponse;
use Telnyx\NumberReservations\NumberReservationNewResponse;
use Telnyx\NumberReservations\ReservedPhoneNumber;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberReservationsContract;
use Telnyx\Services\NumberReservations\ActionsService;

use const Telnyx\Core\OMIT as omit;

final class NumberReservationsService implements NumberReservationsContract
{
    /**
     * @@api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($this->client);
    }

    /**
     * @api
     *
     * Creates a Phone Number Reservation for multiple numbers.
     *
     * @param string $customerReference a customer reference string for customer look ups
     * @param list<ReservedPhoneNumber> $phoneNumbers
     */
    public function create(
        $customerReference = omit,
        $phoneNumbers = omit,
        ?RequestOptions $requestOptions = null,
    ): NumberReservationNewResponse {
        [$parsed, $options] = NumberReservationCreateParams::parseRequest(
            [
                'customerReference' => $customerReference,
                'phoneNumbers' => $phoneNumbers,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'number_reservations',
            body: (object) $parsed,
            options: $options,
            convert: NumberReservationNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Gets a single phone number reservation.
     */
    public function retrieve(
        string $numberReservationID,
        ?RequestOptions $requestOptions = null
    ): NumberReservationGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['number_reservations/%1$s', $numberReservationID],
            options: $requestOptions,
            convert: NumberReservationGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Gets a paginated list of phone number reservations.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers.phone_number], filter[customer_reference]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): NumberReservationListResponse {
        [$parsed, $options] = NumberReservationListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'number_reservations',
            query: $parsed,
            options: $options,
            convert: NumberReservationListResponse::class,
        );
    }
}
