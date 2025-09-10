<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WirelessContract;
use Telnyx\Services\Wireless\DetailRecordsReportsService;
use Telnyx\Wireless\WirelessGetRegionsResponse;
use Telnyx\Wireless\WirelessRetrieveRegionsParams;

final class WirelessService implements WirelessContract
{
    /**
     * @@api
     */
    public DetailRecordsReportsService $detailRecordsReports;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->detailRecordsReports = new DetailRecordsReportsService(
            $this->client
        );
    }

    /**
     * @api
     *
     * Retrieve all wireless regions for the given product.
     *
     * @param string $product The product for which to list regions (e.g., 'public_ips', 'private_wireless_gateways').
     */
    public function retrieveRegions(
        $product,
        ?RequestOptions $requestOptions = null
    ): WirelessGetRegionsResponse {
        [$parsed, $options] = WirelessRetrieveRegionsParams::parseRequest(
            ['product' => $product],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'wireless/regions',
            query: $parsed,
            options: $options,
            convert: WirelessGetRegionsResponse::class,
        );
    }
}
