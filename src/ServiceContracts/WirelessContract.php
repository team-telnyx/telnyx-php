<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\RequestOptions;
use Telnyx\Wireless\WirelessGetRegionsResponse;

interface WirelessContract
{
    /**
     * @api
     *
     * @param string $product The product for which to list regions (e.g., 'public_ips', 'private_wireless_gateways').
     */
    public function retrieveRegions(
        $product,
        ?RequestOptions $requestOptions = null
    ): WirelessGetRegionsResponse;
}
