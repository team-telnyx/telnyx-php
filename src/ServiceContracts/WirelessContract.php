<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Wireless\WirelessGetRegionsResponse;
use Telnyx\Wireless\WirelessRetrieveRegionsParams;

interface WirelessContract
{
    /**
     * @api
     *
     * @param array<mixed>|WirelessRetrieveRegionsParams $params
     *
     * @throws APIException
     */
    public function retrieveRegions(
        array|WirelessRetrieveRegionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): WirelessGetRegionsResponse;
}
