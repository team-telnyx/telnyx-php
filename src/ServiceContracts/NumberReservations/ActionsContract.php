<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\NumberReservations;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberReservations\Actions\ActionExtendResponse;
use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     *
     * @param string $numberReservationID the number reservation ID
     *
     * @throws APIException
     */
    public function extend(
        string $numberReservationID,
        ?RequestOptions $requestOptions = null
    ): ActionExtendResponse;
}
