<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\List\ListGetAllResponse;
use Telnyx\List\ListGetByZoneResponse;
use Telnyx\RequestOptions;

interface ListContract
{
    /**
     * @api
     */
    public function retrieveAll(
        ?RequestOptions $requestOptions = null
    ): ListGetAllResponse;

    /**
     * @api
     */
    public function retrieveByZone(
        string $channelZoneID,
        ?RequestOptions $requestOptions = null
    ): ListGetByZoneResponse;
}
