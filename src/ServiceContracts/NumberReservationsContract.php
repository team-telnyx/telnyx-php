<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\NumberReservations\NumberReservationGetResponse;
use Telnyx\NumberReservations\NumberReservationListParams\Filter;
use Telnyx\NumberReservations\NumberReservationListParams\Page;
use Telnyx\NumberReservations\NumberReservationListResponse;
use Telnyx\NumberReservations\NumberReservationNewResponse;
use Telnyx\NumberReservations\ReservedPhoneNumber;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface NumberReservationsContract
{
    /**
     * @api
     *
     * @param string $customerReference a customer reference string for customer look ups
     * @param list<ReservedPhoneNumber> $phoneNumbers
     */
    public function create(
        $customerReference = omit,
        $phoneNumbers = omit,
        ?RequestOptions $requestOptions = null,
    ): NumberReservationNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $numberReservationID,
        ?RequestOptions $requestOptions = null
    ): NumberReservationGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers.phone_number], filter[customer_reference]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): NumberReservationListResponse;
}
