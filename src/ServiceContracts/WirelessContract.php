<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Wireless\WirelessGetRegionsResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface WirelessContract
{
    /**
     * @api
     *
     * @param string $product The product for which to list regions (e.g., 'public_ips', 'private_wireless_gateways').
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveRegions(
        string $product,
        RequestOptions|array|null $requestOptions = null
    ): WirelessGetRegionsResponse;
}
