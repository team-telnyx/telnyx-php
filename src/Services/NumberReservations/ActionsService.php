<?php

declare(strict_types=1);

namespace Telnyx\Services\NumberReservations;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberReservations\Actions\ActionExtendResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberReservations\ActionsContract;

/**
 * Number reservations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * Extends reservation expiry time on all phone numbers.
     *
     * @param string $numberReservationID the number reservation ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function extend(
        string $numberReservationID,
        RequestOptions|array|null $requestOptions = null,
    ): ActionExtendResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->extend($numberReservationID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
