<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WirelessBlocklistsContract;
use Telnyx\WirelessBlocklists\WirelessBlocklistCreateParams;
use Telnyx\WirelessBlocklists\WirelessBlocklistDeleteResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistGetResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistListParams;
use Telnyx\WirelessBlocklists\WirelessBlocklistListResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistNewResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistUpdateParams;
use Telnyx\WirelessBlocklists\WirelessBlocklistUpdateResponse;

final class WirelessBlocklistsService implements WirelessBlocklistsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a Wireless Blocklist to prevent SIMs from connecting to certain networks.
     *
     * @param array{
     *   name: string, type: 'country'|'mcc'|'plmn', values: list<string>
     * }|WirelessBlocklistCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|WirelessBlocklistCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): WirelessBlocklistNewResponse {
        [$parsed, $options] = WirelessBlocklistCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'wireless_blocklists',
            body: (object) $parsed,
            options: $options,
            convert: WirelessBlocklistNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve information about a Wireless Blocklist.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WirelessBlocklistGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['wireless_blocklists/%1$s', $id],
            options: $requestOptions,
            convert: WirelessBlocklistGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a Wireless Blocklist.
     *
     * @param array{
     *   name?: string, type?: 'country'|'mcc'|'plmn', values?: list<string>
     * }|WirelessBlocklistUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        array|WirelessBlocklistUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): WirelessBlocklistUpdateResponse {
        [$parsed, $options] = WirelessBlocklistUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: 'wireless_blocklists',
            body: (object) $parsed,
            options: $options,
            convert: WirelessBlocklistUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Get all Wireless Blocklists belonging to the user.
     *
     * @param array{
     *   filter_name_?: string,
     *   filter_type_?: string,
     *   filter_values_?: string,
     *   page_number_?: int,
     *   page_size_?: int,
     * }|WirelessBlocklistListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|WirelessBlocklistListParams $params,
        ?RequestOptions $requestOptions = null,
    ): WirelessBlocklistListResponse {
        [$parsed, $options] = WirelessBlocklistListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'wireless_blocklists',
            query: $parsed,
            options: $options,
            convert: WirelessBlocklistListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes the Wireless Blocklist.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WirelessBlocklistDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['wireless_blocklists/%1$s', $id],
            options: $requestOptions,
            convert: WirelessBlocklistDeleteResponse::class,
        );
    }
}
