<?php

declare(strict_types=1);

namespace Telnyx\Services\NumberReservations;

use Telnyx\Client;
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
     */
    public function extend(
        string $numberReservationID,
        ?RequestOptions $requestOptions = null
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
