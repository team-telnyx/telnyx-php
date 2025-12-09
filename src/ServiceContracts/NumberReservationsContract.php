<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberReservations\NumberReservationGetResponse;
use Telnyx\NumberReservations\NumberReservationListResponse;
use Telnyx\NumberReservations\NumberReservationNewResponse;
use Telnyx\NumberReservations\ReservedPhoneNumber;
use Telnyx\NumberReservations\ReservedPhoneNumber\Status;
use Telnyx\RequestOptions;

interface NumberReservationsContract
{
    /**
     * @api
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
    ): NumberReservationNewResponse;

    /**
     * @api
     *
     * @param string $numberReservationID the number reservation ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberReservationID,
        ?RequestOptions $requestOptions = null
    ): NumberReservationGetResponse;

    /**
     * @api
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
    ): NumberReservationListResponse;
}
