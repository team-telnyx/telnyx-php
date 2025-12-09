<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WirelessRawContract;
use Telnyx\Wireless\WirelessGetRegionsResponse;
use Telnyx\Wireless\WirelessRetrieveRegionsParams;

final class WirelessRawService implements WirelessRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve all wireless regions for the given product.
     *
     * @param array{product: string}|WirelessRetrieveRegionsParams $params
     *
     * @return BaseResponse<WirelessGetRegionsResponse>
     *
     * @throws APIException
     */
    public function retrieveRegions(
        array|WirelessRetrieveRegionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WirelessRetrieveRegionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'wireless/regions',
            query: $parsed,
            options: $options,
            convert: WirelessGetRegionsResponse::class,
        );
    }
}
