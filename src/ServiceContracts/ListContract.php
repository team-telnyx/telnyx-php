<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\List_\ListGetAllResponse;
use Telnyx\List_\ListGetByZoneResponse;
use Telnyx\RequestOptions;

interface ListContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveAll(
        ?RequestOptions $requestOptions = null
    ): ListGetAllResponse;

    /**
     * @api
     *
     * @param string $channelZoneID Channel zone identifier
     *
     * @throws APIException
     */
    public function retrieveByZone(
        string $channelZoneID,
        ?RequestOptions $requestOptions = null
    ): ListGetByZoneResponse;
}
