<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\List\ListGetAllResponse;
use Telnyx\List\ListGetByZoneResponse;
use Telnyx\RequestOptions;

interface ListContract
{
    /**
     * @api
     *
     * @return ListGetAllResponse<HasRawResponse>
     */
    public function retrieveAll(
        ?RequestOptions $requestOptions = null
    ): ListGetAllResponse;

    /**
     * @api
     *
     * @return ListGetByZoneResponse<HasRawResponse>
     */
    public function retrieveByZone(
        string $channelZoneID,
        ?RequestOptions $requestOptions = null
    ): ListGetByZoneResponse;
}
