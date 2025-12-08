<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WirelessContract;
use Telnyx\Services\Wireless\DetailRecordsReportsService;
use Telnyx\Wireless\WirelessGetRegionsResponse;
use Telnyx\Wireless\WirelessRetrieveRegionsParams;

final class WirelessService implements WirelessContract
{
    /**
     * @api
     */
    public DetailRecordsReportsService $detailRecordsReports;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->detailRecordsReports = new DetailRecordsReportsService($client);
    }

    /**
     * @api
     *
     * Retrieve all wireless regions for the given product.
     *
     * @param array{product: string}|WirelessRetrieveRegionsParams $params
     *
     * @throws APIException
     */
    public function retrieveRegions(
        array|WirelessRetrieveRegionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): WirelessGetRegionsResponse {
        [$parsed, $options] = WirelessRetrieveRegionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<WirelessGetRegionsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'wireless/regions',
            query: $parsed,
            options: $options,
            convert: WirelessGetRegionsResponse::class,
        );

        return $response->parse();
    }
}
