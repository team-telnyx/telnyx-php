<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Wireless\WirelessGetRegionsResponse;
use Telnyx\Wireless\WirelessRetrieveRegionsParams;

interface WirelessRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|WirelessRetrieveRegionsParams $params
     *
     * @return BaseResponse<WirelessGetRegionsResponse>
     *
     * @throws APIException
     */
    public function retrieveRegions(
        array|WirelessRetrieveRegionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
