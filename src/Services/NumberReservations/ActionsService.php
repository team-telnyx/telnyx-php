<?php

declare(strict_types=1);

namespace Telnyx\Services\NumberReservations;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\NumberReservations\Actions\ActionExtendResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberReservations\ActionsContract;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Extends reservation expiry time on all phone numbers.
     *
     * @return ActionExtendResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function extend(
        string $numberReservationID,
        ?RequestOptions $requestOptions = null
    ): ActionExtendResponse {
        $params = [];

        return $this->extendRaw($numberReservationID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return ActionExtendResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function extendRaw(
        string $numberReservationID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): ActionExtendResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['number_reservations/%1$s/actions/extend', $numberReservationID],
            options: $requestOptions,
            convert: ActionExtendResponse::class,
        );
    }
}
