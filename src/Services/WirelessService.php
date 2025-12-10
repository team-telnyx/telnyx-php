<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WirelessContract;
use Telnyx\Services\Wireless\DetailRecordsReportsService;
use Telnyx\Wireless\WirelessGetRegionsResponse;

final class WirelessService implements WirelessContract
{
    /**
     * @api
     */
    public WirelessRawService $raw;

    /**
     * @api
     */
    public DetailRecordsReportsService $detailRecordsReports;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WirelessRawService($client);
        $this->detailRecordsReports = new DetailRecordsReportsService($client);
    }

    /**
     * @api
     *
     * Retrieve all wireless regions for the given product.
     *
     * @param string $product The product for which to list regions (e.g., 'public_ips', 'private_wireless_gateways').
     *
     * @throws APIException
     */
    public function retrieveRegions(
        string $product,
        ?RequestOptions $requestOptions = null
    ): WirelessGetRegionsResponse {
        $params = Util::removeNulls(['product' => $product]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveRegions(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
