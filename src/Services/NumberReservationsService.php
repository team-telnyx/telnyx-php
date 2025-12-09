<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberReservations\NumberReservationCreateParams;
use Telnyx\NumberReservations\NumberReservationGetResponse;
use Telnyx\NumberReservations\NumberReservationListParams;
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
     *   customerReference?: string,
     *   phoneNumbers?: list<array{
     *     id?: string,
     *     createdAt?: string|\DateTimeInterface,
     *     expiredAt?: string|\DateTimeInterface,
     *     phoneNumber?: string,
     *     recordType?: string,
     *     status?: 'pending'|'success'|'failure'|Status,
     *     updatedAt?: string|\DateTimeInterface,
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

        /** @var BaseResponse<NumberReservationNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'number_reservations',
            body: (object) $parsed,
            options: $options,
            convert: NumberReservationNewResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<NumberReservationGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['number_reservations/%1$s', $numberReservationID],
            options: $requestOptions,
            convert: NumberReservationGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Gets a paginated list of phone number reservations.
     *
     * @param array{
     *   filter?: array{
     *     createdAt?: array{gt?: string, lt?: string},
     *     customerReference?: string,
     *     phoneNumbersPhoneNumber?: string,
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

        /** @var BaseResponse<NumberReservationListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'number_reservations',
            query: $parsed,
            options: $options,
            convert: NumberReservationListResponse::class,
        );

        return $response->parse();
    }
}
