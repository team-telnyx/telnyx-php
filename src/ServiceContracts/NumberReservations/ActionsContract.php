<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\NumberReservations;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\NumberReservations\Actions\ActionExtendResponse;
use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     *
     * @return ActionExtendResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function extend(
        string $numberReservationID,
        ?RequestOptions $requestOptions = null
    ): ActionExtendResponse;

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
    ): ActionExtendResponse;
}
