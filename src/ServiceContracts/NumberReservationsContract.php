<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NumberReservations\NumberReservation;
use Telnyx\NumberReservations\NumberReservationGetResponse;
use Telnyx\NumberReservations\NumberReservationListParams\Filter;
use Telnyx\NumberReservations\NumberReservationListParams\Page;
use Telnyx\NumberReservations\NumberReservationNewResponse;
use Telnyx\NumberReservations\ReservedPhoneNumber;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ReservedPhoneNumberShape from \Telnyx\NumberReservations\ReservedPhoneNumber
 * @phpstan-import-type FilterShape from \Telnyx\NumberReservations\NumberReservationListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\NumberReservations\NumberReservationListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NumberReservationsContract
{
    /**
     * @api
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
    ): NumberReservationNewResponse;

    /**
     * @api
     *
     * @param string $numberReservationID the number reservation ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberReservationID,
        RequestOptions|array|null $requestOptions = null,
    ): NumberReservationGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers.phone_number], filter[customer_reference]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<NumberReservation>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;
}
