<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Wireless\WirelessGetRegionsResponse;
use Telnyx\Wireless\WirelessRetrieveRegionsParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface WirelessRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|WirelessRetrieveRegionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WirelessGetRegionsResponse>
     *
     * @throws APIException
     */
    public function retrieveRegions(
        array|WirelessRetrieveRegionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
