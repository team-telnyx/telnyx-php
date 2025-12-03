<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NumberReservations\NumberReservation;
use Telnyx\NumberReservations\NumberReservationCreateParams;
use Telnyx\NumberReservations\NumberReservationGetResponse;
use Telnyx\NumberReservations\NumberReservationListParams;
use Telnyx\NumberReservations\NumberReservationNewResponse;
use Telnyx\RequestOptions;

interface NumberReservationsContract
{
    /**
     * @api
     *
     * @param array<mixed>|NumberReservationCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|NumberReservationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberReservationNewResponse;

    /**
     * @api
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
     * @param array<mixed>|NumberReservationListParams $params
     *
     * @return DefaultPagination<NumberReservation>
     *
     * @throws APIException
     */
    public function list(
        array|NumberReservationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
