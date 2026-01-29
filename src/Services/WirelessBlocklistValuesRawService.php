<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WirelessBlocklistValuesRawContract;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListParams;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListParams\Type;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class WirelessBlocklistValuesRawService implements WirelessBlocklistValuesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve all wireless blocklist values for a given blocklist type.
     *
     * @param array{type: Type|value-of<Type>}|WirelessBlocklistValueListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WirelessBlocklistValueListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|WirelessBlocklistValueListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
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
