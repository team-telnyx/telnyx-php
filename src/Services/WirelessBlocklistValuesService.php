<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WirelessBlocklistValuesContract;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListParams\Type;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse;

final class WirelessBlocklistValuesService implements WirelessBlocklistValuesContract
{
    /**
     * @api
     */
    public WirelessBlocklistValuesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WirelessBlocklistValuesRawService($client);
    }

    /**
     * @api
     *
     * Retrieve all wireless blocklist values for a given blocklist type.
     *
     * @param 'country'|'mcc'|'plmn'|Type $type The Wireless Blocklist type for which to list possible values (e.g., `country`, `mcc`, `plmn`).
     *
     * @throws APIException
     */
    public function list(
        string|Type $type,
        ?RequestOptions $requestOptions = null
    ): WirelessBlocklistValueListResponse {
        $params = ['type' => $type];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
