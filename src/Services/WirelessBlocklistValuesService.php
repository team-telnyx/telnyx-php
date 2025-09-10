<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WirelessBlocklistValuesContract;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListParams;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListParams\Type;
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
     * @param Type|value-of<Type> $type The Wireless Blocklist type for which to list possible values (e.g., `country`, `mcc`, `plmn`).
     */
    public function list(
        $type,
        ?RequestOptions $requestOptions = null
    ): WirelessBlocklistValueListResponse {
        [$parsed, $options] = WirelessBlocklistValueListParams::parseRequest(
            ['type' => $type],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'wireless_blocklist_values',
            query: $parsed,
            options: $options,
            convert: WirelessBlocklistValueListResponse::class,
        );
    }
}
