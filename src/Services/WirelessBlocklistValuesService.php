<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WirelessBlocklistValuesContract;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListParams;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse;

final class WirelessBlocklistValuesService implements WirelessBlocklistValuesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve all wireless blocklist values for a given blocklist type.
     *
     * @param array{
     *   type: 'country'|'mcc'|'plmn'
     * }|WirelessBlocklistValueListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|WirelessBlocklistValueListParams $params,
        ?RequestOptions $requestOptions = null,
    ): WirelessBlocklistValueListResponse {
        [$parsed, $options] = WirelessBlocklistValueListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'wireless_blocklist_values',
            query: $parsed,
            options: $options,
            convert: WirelessBlocklistValueListResponse::class,
        );
    }
}
