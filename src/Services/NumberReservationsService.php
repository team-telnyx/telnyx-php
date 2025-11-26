<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberReservations\NumberReservationCreateParams;
use Telnyx\NumberReservations\NumberReservationGetResponse;
use Telnyx\NumberReservations\NumberReservationListParams;
use Telnyx\NumberReservations\NumberReservationListResponse;
use Telnyx\NumberReservations\NumberReservationNewResponse;
use Telnyx\NumberReservations\ReservedPhoneNumber;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberReservationsContract;
use Telnyx\Services\NumberReservations\ActionsService;

final class NumberReservationsService implements NumberReservationsContract
{
    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Creates a Phone Number Reservation for multiple numbers.
     *
     * @param array{
     *   customer_reference?: string,
     *   phone_numbers?: list<array{
     *     id?: string,
     *     created_at?: string|\DateTimeInterface,
     *     expired_at?: string|\DateTimeInterface,
     *     phone_number?: string,
     *     record_type?: string,
     *     status?: 'pending'|'success'|'failure',
     *     updated_at?: string|\DateTimeInterface,
     *   }|ReservedPhoneNumber>,
     * }|NumberReservationCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|NumberReservationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberReservationNewResponse {
        [$parsed, $options] = NumberReservationCreateParams::parseRequest(
            $params,
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
     *
     * @throws APIException
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
     * @param array{
     *   filter?: array{
     *     created_at?: array{gt?: string, lt?: string},
     *     customer_reference?: string,
     *     'phone_numbers.phone_number'?: string,
     *     status?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|NumberReservationListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|NumberReservationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberReservationListResponse {
        [$parsed, $options] = NumberReservationListParams::parseRequest(
            $params,
            $requestOptions,
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
