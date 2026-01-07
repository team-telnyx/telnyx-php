<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WirelessBlocklistsContract;
use Telnyx\WirelessBlocklists\WirelessBlocklist;
use Telnyx\WirelessBlocklists\WirelessBlocklistCreateParams\Type;
use Telnyx\WirelessBlocklists\WirelessBlocklistDeleteResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistGetResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistNewResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class WirelessBlocklistsService implements WirelessBlocklistsContract
{
    /**
     * @api
     */
    public WirelessBlocklistsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WirelessBlocklistsRawService($client);
    }

    /**
     * @api
     *
     * Create a Wireless Blocklist to prevent SIMs from connecting to certain networks.
     *
     * @param string $name the name of the Wireless Blocklist
     * @param Type|value-of<Type> $type the type of wireless blocklist
     * @param list<string> $values Values to block. The values here depend on the `type` of Wireless Blocklist.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        Type|string $type,
        array $values,
        RequestOptions|array|null $requestOptions = null,
    ): WirelessBlocklistNewResponse {
        $params = Util::removeNulls(
            ['name' => $name, 'type' => $type, 'values' => $values]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve information about a Wireless Blocklist.
     *
     * @param string $id identifies the wireless blocklist
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): WirelessBlocklistGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a Wireless Blocklist.
     *
     * @param string $name the name of the Wireless Blocklist
     * @param \Telnyx\WirelessBlocklists\WirelessBlocklistUpdateParams\Type|value-of<\Telnyx\WirelessBlocklists\WirelessBlocklistUpdateParams\Type> $type the type of wireless blocklist
     * @param list<string> $values Values to block. The values here depend on the `type` of Wireless Blocklist.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        ?string $name = null,
        \Telnyx\WirelessBlocklists\WirelessBlocklistUpdateParams\Type|string|null $type = null,
        ?array $values = null,
        RequestOptions|array|null $requestOptions = null,
    ): WirelessBlocklistUpdateResponse {
        $params = Util::removeNulls(
            ['name' => $name, 'type' => $type, 'values' => $values]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<WirelessBlocklist>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterName = null,
        ?string $filterType = null,
        ?string $filterValues = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterName' => $filterName,
                'filterType' => $filterType,
                'filterValues' => $filterValues,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes the Wireless Blocklist.
     *
     * @param string $id identifies the wireless blocklist
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): WirelessBlocklistDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
