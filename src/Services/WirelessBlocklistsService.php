<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WirelessBlocklistsContract;
use Telnyx\WirelessBlocklists\WirelessBlocklistCreateParams;
use Telnyx\WirelessBlocklists\WirelessBlocklistCreateParams\Type;
use Telnyx\WirelessBlocklists\WirelessBlocklistDeleteResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistGetResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistListParams;
use Telnyx\WirelessBlocklists\WirelessBlocklistListResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistNewResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistUpdateParams;
use Telnyx\WirelessBlocklists\WirelessBlocklistUpdateParams\Type as Type1;
use Telnyx\WirelessBlocklists\WirelessBlocklistUpdateResponse;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $name the name of the Wireless Blocklist
     * @param Type|value-of<Type> $type the type of wireless blocklist
     * @param list<string> $values Values to block. The values here depend on the `type` of Wireless Blocklist.
     */
    public function create(
        $name,
        $type,
        $values,
        ?RequestOptions $requestOptions = null
    ): WirelessBlocklistNewResponse {
        [$parsed, $options] = WirelessBlocklistCreateParams::parseRequest(
            ['name' => $name, 'type' => $type, 'values' => $values],
            $requestOptions
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
     * @param string $name the name of the Wireless Blocklist
     * @param Type1|value-of<Type1> $type the type of wireless blocklist
     * @param list<string> $values Values to block. The values here depend on the `type` of Wireless Blocklist.
     */
    public function update(
        $name = omit,
        $type = omit,
        $values = omit,
        ?RequestOptions $requestOptions = null,
    ): WirelessBlocklistUpdateResponse {
        [$parsed, $options] = WirelessBlocklistUpdateParams::parseRequest(
            ['name' => $name, 'type' => $type, 'values' => $values],
            $requestOptions
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
     * @param string $filterName the name of the Wireless Blocklist
     * @param string $filterType when the Private Wireless Gateway was last updated
     * @param string $filterValues values to filter on (inclusive)
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     */
    public function list(
        $filterName = omit,
        $filterType = omit,
        $filterValues = omit,
        $pageNumber = omit,
        $pageSize = omit,
        ?RequestOptions $requestOptions = null,
    ): WirelessBlocklistListResponse {
        [$parsed, $options] = WirelessBlocklistListParams::parseRequest(
            [
                'filterName' => $filterName,
                'filterType' => $filterType,
                'filterValues' => $filterValues,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
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
