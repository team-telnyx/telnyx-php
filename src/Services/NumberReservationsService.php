<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberReservations\NumberReservationGetResponse;
use Telnyx\NumberReservations\NumberReservationListResponse;
use Telnyx\NumberReservations\NumberReservationNewResponse;
use Telnyx\NumberReservations\ReservedPhoneNumber;
use Telnyx\NumberReservations\ReservedPhoneNumber\Status;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberReservationsContract;
use Telnyx\Services\NumberReservations\ActionsService;

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
     * @param list<array{
     *   id?: string,
     *   createdAt?: string|\DateTimeInterface,
     *   expiredAt?: string|\DateTimeInterface,
     *   phoneNumber?: string,
     *   recordType?: string,
     *   status?: 'pending'|'success'|'failure'|Status,
     *   updatedAt?: string|\DateTimeInterface,
     * }|ReservedPhoneNumber> $phoneNumbers
     *
     * @throws APIException
     */
    public function create(
        ?string $customerReference = null,
        ?array $phoneNumbers = null,
        ?RequestOptions $requestOptions = null,
    ): NumberReservationNewResponse {
        $params = [
            'customerReference' => $customerReference, 'phoneNumbers' => $phoneNumbers,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberReservationID,
        ?RequestOptions $requestOptions = null
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
     * @param array{
     *   createdAt?: array{gt?: string, lt?: string},
     *   customerReference?: string,
     *   phoneNumbersPhoneNumber?: string,
     *   status?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers.phone_number], filter[customer_reference]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): NumberReservationListResponse {
        $params = ['filter' => $filter, 'page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
