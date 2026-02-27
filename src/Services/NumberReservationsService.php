<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\NumberReservations\NumberReservation;
use Telnyx\NumberReservations\NumberReservationGetResponse;
use Telnyx\NumberReservations\NumberReservationListParams\Filter;
use Telnyx\NumberReservations\NumberReservationNewResponse;
use Telnyx\NumberReservations\ReservedPhoneNumber;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberReservationsContract;
use Telnyx\Services\NumberReservations\ActionsService;

/**
 * Number reservations.
 *
 * @phpstan-import-type ReservedPhoneNumberShape from \Telnyx\NumberReservations\ReservedPhoneNumber
 * @phpstan-import-type FilterShape from \Telnyx\NumberReservations\NumberReservationListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NumberReservationsService implements NumberReservationsContract
{
    /**
     * @api
     */
    public NumberReservationsRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NumberReservationsRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Creates a Phone Number Reservation for multiple numbers.
     *
     * @param string $customerReference a customer reference string for customer look ups
     * @param list<ReservedPhoneNumber|ReservedPhoneNumberShape> $phoneNumbers
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $customerReference = null,
        ?array $phoneNumbers = null,
        RequestOptions|array|null $requestOptions = null,
    ): NumberReservationNewResponse {
        $params = Util::removeNulls(
            [
                'customerReference' => $customerReference,
                'phoneNumbers' => $phoneNumbers,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Gets a single phone number reservation.
     *
     * @param string $numberReservationID the number reservation ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberReservationID,
        RequestOptions|array|null $requestOptions = null,
    ): NumberReservationGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($numberReservationID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Gets a paginated list of phone number reservations.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers.phone_number], filter[customer_reference]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<NumberReservation>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
