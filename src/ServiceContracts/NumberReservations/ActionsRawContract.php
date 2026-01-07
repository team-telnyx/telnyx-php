<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\NumberReservations;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberReservations\Actions\ActionExtendResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $numberReservationID the number reservation ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionExtendResponse>
     *
     * @throws APIException
     */
    public function extend(
        string $numberReservationID,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
