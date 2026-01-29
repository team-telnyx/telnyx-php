<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NumberReservations\NumberReservation;
use Telnyx\NumberReservations\NumberReservationCreateParams;
use Telnyx\NumberReservations\NumberReservationGetResponse;
use Telnyx\NumberReservations\NumberReservationListParams;
use Telnyx\NumberReservations\NumberReservationListParams\Filter;
use Telnyx\NumberReservations\NumberReservationListParams\Page;
use Telnyx\NumberReservations\NumberReservationNewResponse;
use Telnyx\NumberReservations\ReservedPhoneNumber;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberReservationsRawContract;

/**
 * @phpstan-import-type ReservedPhoneNumberShape from \Telnyx\NumberReservations\ReservedPhoneNumber
 * @phpstan-import-type FilterShape from \Telnyx\NumberReservations\NumberReservationListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\NumberReservations\NumberReservationListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NumberReservationsRawService implements NumberReservationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a Phone Number Reservation for multiple numbers.
     *
     * @param array{
     *   customerReference?: string,
     *   phoneNumbers?: list<ReservedPhoneNumber|ReservedPhoneNumberShape>,
     * }|NumberReservationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberReservationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NumberReservationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberReservationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $numberReservationID the number reservation ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberReservationGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberReservationID,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     *   filter?: Filter|FilterShape, page?: Page|PageShape
     * }|NumberReservationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<NumberReservation>>
     *
     * @throws APIException
     */
    public function list(
        array|NumberReservationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberReservationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'number_reservations',
            query: $parsed,
            options: $options,
            convert: NumberReservation::class,
            page: DefaultPagination::class,
        );
    }
}
